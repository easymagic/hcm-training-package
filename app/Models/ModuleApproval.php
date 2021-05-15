<?php

namespace App\Models;

use App\Notifications\ApproveLeaveRequest;
use App\Notifications\LeaveRequestApproved;
use App\Stage;
use App\Workflow;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ModuleApproval extends Model
{
    //

    protected $fillable = ['module_id','module','stage_id','status','approver_id','comments'];


    static function fetchByModule($module_id,$module){
        $records = self::query()->where('module_id',$module_id)->where('module',$module);
        return $records;
    }

    static function getFirstStageForWorkflow($name){
        return Stage::query()->whereHas('workflow',function(Builder $builder) use ($name){
            return $builder->where('name',$name);
        })->where('position',0);
    }

    function setModuleApprovalInterface(){}

    function getByModule(){
        $id = $this->module_id;
        $module = $this->module;
        return self::query()->where('module',$module)->where('module_id',$id);
    }

    function getModuleObject(){
        $mod = $this->getByModule()->first();
        $module_id = $mod->module_id;
        $cls = $mod->module;

        return $cls::query()->find($module_id);
    }

    function getNarration(){
        $obj = $this->getModuleObject();
//        dd($obj);
        if (method_exists($obj,'getNarration')){
            return  $obj->getNarration();
        }
        return 'No set narration!';
    }

    function getPreviewLink(){
        if (method_exists($this->getByModule(),'getPreviewLink')){
            return  $this->getByModule()->getPreviewLink();
        }
        return '(no-link)';
    }

    static function getById($id){
        return self::query()->find($id);
    }

    static function nextStage($id){
        $approval = self::getById($id);
        $stage = $approval->stage;
        if ($stage){
            $workFlowId  = $stage->workflow->id;
            $position = $stage->position + 1;
            $newStage = Stage::query()->where('workflow_id',$workFlowId)->where('position',$position)->first();
            return $newStage;
        }
        return $stage;
    }

    static function alreadyHasNextStage($approval,$stage){
        $module =  $approval->module;
        $module_id = $approval->module_id;
        $query = ModuleApproval::query()->where('module',$module)->where('module_id',$module_id)
        ->where('stage_id',$stage->id);
        return $query;
    }

    static function approve($id){
        $record = self::getById($id);

        $module = $record->getModuleObject();

        $record->update([
            'status'=>1,
            'comments'=>request('comments'),
            'approver_id'=>Auth::user()->id
        ]);

//        dd($record);

        $nextStage = self::nextStage($id);

//        dd($nextStage);



        if ($nextStage && !self::alreadyHasNextStage($record,$nextStage)->exists()){

//            dd($nextStage->id,$record->stage_id,$nextStage,$record);

//            dd('called...');

            $newApproval = self::createApproval([
                'module_id'=>request('module_id'),
                'module'=>request('module'),
                'stage_id'=>$nextStage->id,
                'status'=>0, //$data['status'],
//                'approver_id'=>request('approver_id'),
                'comments'=>'...'
            ]);

            if (method_exists($module,'notifyApproved')){
                $module->notifyApproved(self::getSubscribers($newApproval->id));
            }

            return response()->json([
                'message'=>'Request approved',
                'error'=>false
            ]);

        }

        if (method_exists($module,'notifyFinalApproved')){
            $module->notifyFinalApproved(self::getSubscribers($record->id));
        }

        return response()->json([
            'message'=>'Request approved',
            'error'=>false
        ]);

    }


    static function reject($id){
        $record = self::getById($id);

        $module = $record->getModuleObject();

        $record->update([
            'status'=>2,
            'comments'=>request('comments'),
            'approver_id'=>Auth::user()->id
        ]);

//        dd($module,method_exists($module,'notifyRejected'));

        if (method_exists($module,'notifyRejected')){
            $module->notifyRejected([$module->user]);
        }

        return response()->json([
            'message'=>'Request rejected',
            'error'=>true
        ]);

    }

    static function getSubscribers($id){

        $approval = self::getById($id)->first();
        $stage = $approval->stage;

        $list = [];

        if ($stage->type == 1) {

            $list[] = $stage->user;

        } elseif ($stage->type == 2) {

            if ($stage->role->manages == 'dr') {

                foreach ($approval->getModuleObject()->user->managers as $manager) {
                    $list[] = $manager;
                }

            }elseif ($stage->role->manages == 'ss') {

                $ss = $approval->getModuleObject()->user->plmanager->managers;

//                if (!$ss) {
//                    $list[] = $approval->getByModule()->user;
//                }

                foreach ($approval->getModuleObject()->user->plmanager->managers as $manager) {
                    $list[] = $manager;
                }

            } elseif ($stage->role->manages == 'all') {

                foreach ($stage->role->users as $user) {
                    $list[] = $user;
                }

            } elseif ($stage->role->manages == 'none') {
                foreach ($stage->role->users as $user) {
                    $list[] = $user;
                }
            }
        } elseif ($stage->type == 3) {
            //1-user
            //2-role
            //3-groups
            // return 'not_blank';

            foreach ($stage->group->users as $user) {
                $list[] = $user;
            }
        }

        return $list;

    }

    static function firstTimeCreate($data){

        $obj = self::createApproval($data);
        $record = self::getById($obj->id);
        $module = $record->getByModule();

        if (method_exists($module,'notifyFirstTimeCreate')){
            $module->notifyFirstTimeCreate(self::getSubscribers($obj->id));
        }

    }

    static function getWorkFlowByName($name){
        $record = Workflow::query()->where('name',$name);
        return $record;
    }

    static function createApproval($data){
        $obj = new self;
        $obj = $obj->create([
            'module_id'=>$data['module_id'],
            'module'=>$data['module'],
            'stage_id'=>$data['stage_id'],
            'status'=>0, //$data['status'],
//            'approver_id'=>$data['approver_id'],
            'comments'=>$data['comments']
        ]);

        return $obj;
    }

    public function approver()
    {
        return $this->belongsTo('App\User','approver_id')->withDefault([
            'blank_name'=>'N/A',
            'blank'=>true
        ]);
    }
    public function stage()
    {
        return $this->belongsTo('App\Stage','stage_id');
    }

}
