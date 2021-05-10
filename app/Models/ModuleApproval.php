<?php

namespace App\Models;

use App\Notifications\ApproveLeaveRequest;
use App\Notifications\LeaveRequestApproved;
use App\Stage;
use App\Workflow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ModuleApproval extends Model
{
    //

    protected $fillable = ['module_id','module','stage_id','status','approver_id','comments'];


    function getByModule(){
        $id = $this->module_id;
        $module = $this->module;
        return self::query()->where('module',$module)->where('module_id',$id);
    }

    static function getById($id){
        return self::query()->find($id);
    }

    static function nextStage($id){
        $approval = self::getById($id)->first();
        $stage = $approval->stage;
        if ($stage){
            $workFlowId  = $stage->workflow->id;
            $position = $stage->position + 1;
            $newStage = Stage::query()->where('workflow_id',$workFlowId)->where('position',$position)->first();
            return $newStage;
        }
        return $stage;
    }

    static function approve($id){
        $record = self::getById($id)->first();

        $module = $record->getByModule();

        $record->update([
            'status'=>1,
            'comments'=>request('comments'),
            'approver_id'=>Auth::user()->id
        ]);

        $nextStage = self::nextStage($id);

        if ($nextStage){

            $newApproval = self::createApproval([
                'module_id'=>request('module_id'),
                'module'=>request('module'),
                'stage_id'=>$nextStage->id,
                'status'=>0, //$data['status'],
//            'approver_id'=>$data['approver_id'],
                'comments'=>request('comments')
            ]);

            if (method_exists($module,'notifyApproved')){
                $module->notifyApproved(self::getSubscribers($newApproval->id));
            }

            return response()->json([
                'message'=>'Request approved',
                'error'=>false
            ]);

        }

        if (method_exists($module,'notifyApproved')){
            $module->notifyApproved(self::getSubscribers($record->id));
        }

        return response()->json([
            'message'=>'Request approved',
            'error'=>false
        ]);

    }


    static function reject($id){
        $record = self::getById($id)->first();

        $module = $record->getByModule();

        $record->update([
            'status'=>2,
            'comments'=>request('comments'),
            'approver_id'=>Auth::user()->id
        ]);

        if (method_exists($module,'notifyRejected')){
            $module->notifyRejected([$module->user]);
        }

        return response()->json([
            'message'=>'Request rejected',
            'error'=>false
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

                foreach ($approval->getByModule()->user->managers as $manager) {
                    $list[] = $manager;
                }

            }elseif ($stage->role->manages == 'ss') {

                $ss = $approval->getByModule()->user->plmanager->managers;

//                if (!$ss) {
//                    $list[] = $approval->getByModule()->user;
//                }

                foreach ($approval->getByModule()->user->plmanager->managers as $manager) {
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
        return $this->belongsTo('App\User','approver_id');
    }
    public function stage()
    {
        return $this->belongsTo('App\Stage','stage_id');
    }

}
