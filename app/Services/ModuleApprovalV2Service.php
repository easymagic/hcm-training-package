<?php


namespace App\Services;


use App\Interfaces\ModuleApprovalInterface;
use App\Models\ModuleApproval;
use App\Stage;
use App\Workflow;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ModuleApprovalV2Service
{

    private static $listener = null;

    static function setListener(ModuleApprovalInterface  $moduleApprovalInterface){
        self::$listener = $moduleApprovalInterface;
    }


    static function getModuleObject($id){
        $mod = ModuleApproval::query()->find($id);
        $module_id = $mod->module_id;
        $cls = $mod->module;
//        dd($cls);
        return $cls::query()->find($module_id);
    }

    static function getModuleObjectByModule($id,$module){
        $mod = ModuleApproval::query()->where('module_id',$id)->where('module',$module)->first();
        $module_id = $mod->module_id;
        $cls = $mod->module;
        return $cls::query()->find($module_id);
    }

    static function fetchApprovalsByModule($id,$module){
        return ModuleApproval::query()->where('module_id',$id)->where('module',$module)->get();
    }

    static function proxyCallMathod($obj,$method,$args=[]){
        if (method_exists($obj,$method)){
            return call_user_func_array([$obj,$method],$args); //$obj->$method();
        }
        return null;
    }

    static function getNarration($id){
        $obj = self::getModuleObject($id);
        return self::proxyCallMathod($obj,'getNarration');
    }

    static function getPreviewLink($id){
        $obj = self::getModuleObject($id);
        return self::proxyCallMathod($obj,'getPreviewLink');
    }

    static function getById($id){
        return ModuleApproval::query()->find($id);
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

        $module = self::getModuleObject($id);

        $record->update([
            'status'=>1,
            'comments'=>request('comments'),
            'approver_id'=>Auth::user()->id
        ]);


        $nextStage = self::nextStage($id);


        if ($nextStage && !self::alreadyHasNextStage($record,$nextStage)->exists()){


            $newApproval = self::createApproval([
                'module_id'=>request('module_id'),
                'module'=>request('module'),
                'stage_id'=>$nextStage->id,
                'status'=>0, //$data['status'],
//                'approver_id'=>request('approver_id'),
                'comments'=>'...'
            ]);



            self::proxyCallMathod($module,'notifyApproved',[$module->id,self::getSubscribers($newApproval->id)]);

            return response()->json([
                'message'=>'Request approved',
                'error'=>false
            ]);

        }


        self::proxyCallMathod($module,'notifyFinalApproved',[$module->id,self::getSubscribers($record->id)]);


        return response()->json([
            'message'=>'Request approved',
            'error'=>false
        ]);


    }



    static function reject($id){
        $record = self::getById($id);

        $module = self::getModuleObject($id);

        $record->update([
            'status'=>2,
            'comments'=>request('comments'),
            'approver_id'=>Auth::user()->id
        ]);

//        dd(self::$listener);


        self::proxyCallMathod($module,'notifyRejected',[$module->id,[$module->user]]);


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

                foreach (self::getModuleObject($id)->user->managers as $manager) {
                    $list[] = $manager;
                }

            }elseif ($stage->role->manages == 'ss') {

                $ss = self::getModuleObject($id)->user->plmanager->managers;

                foreach ($ss as $manager) {
                    $list[] = $manager;
                }

            } elseif ($stage->role->manages == 'all') {

                foreach ($stage->role->users as $user){
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
        $module = self::getModuleObject($obj->id);

        self::proxyCallMathod($module,'notifyFirstTimeCreate',[$module->id,self::getSubscribers($obj->id)]);

    }


    static function getWorkFlowByName($name){
        $record = Workflow::query()->where('name',$name);
        return $record;
    }

    static function createApproval($data){
        $obj = new ModuleApproval;
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



    static function getFirstStageForWorkflow($name){
        return Stage::query()->whereHas('workflow',function(Builder $builder) use ($name){
            return $builder->where('name',$name);
        })->where('position',0);
    }


    static function canApprove($userId,$id){

//        return false;

        $licencedUsers = self::getSubscribers($id);

        $userIdList = [];

        foreach ($licencedUsers as $user){

            $userIdList[] = $user->id;

        }

//        dd($userIdList);

        return in_array($userId,$userIdList);

    }




}