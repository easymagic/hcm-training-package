<?php


namespace App\Services;


use App\Department;
use App\Models\ModuleApproval;
use App\Models\TrainingV2;
use Illuminate\Support\Facades\Auth;

class TrainingV2Service
{
    static function fetchApproved(){
        return TrainingV2::query()->where('approved',1);
    }

    static function getById($id){
        return TrainingV2::query()->find($id);
    }

    static function getDepartments(){

        $query = Department::query()->where('company_id',companyId());

        if (!is_null(Auth::user()->department)){
            $query = $query->where('id',Auth::user()->department->id);
        }


        return $query->get();

    }

    static function getFactory(){
        return new TrainingV2;
    }

    static function getValidation(){
        return [
            'name'=>'required',
            'year'=>'required',
            'cost'=>'required',
//            'is_free'=>'required',
            'type'=>'required', //online or physical
            'resource_link'=>'required',
            'start_date'=>'required',
            'stop_date'=>'required',
            'department_id'=>'required',
            'created_by'=>'required'

        ];
    }



    static function createTraining(){

        $workFlowName = 'training-workflow';

        $workFlow = ModuleApprovalV2Service::getWorkFlowByName($workFlowName); // ModuleApproval::getWorkFlowByName($workFlowName);
        if (!$workFlow->exists()){

            return response()->json([
                'message'=>"Workflow with name '$workFlowName' not configured!",
                'error'=>true
            ]);

        }

        $workFlow = $workFlow->first();

        $data = request()->validate(self::getValidation());

        $data['workflow_id'] = $workFlow->id;

        $obj = self::getFactory();

        if (request()->filled('is_free')){
            $data['is_free'] = request('is_free');
        }

        $obj = $obj->create($data);

        ModuleApprovalV2Service::firstTimeCreate([
            'stage_id'=>ModuleApprovalV2Service::getFirstStageForWorkflow($workFlowName)->first()->id,
            'module'=>TrainingV2::class,
            'module_id'=>$obj->id,
            'comments'=>'...'
        ]);

        return response()->json([
            'message'=>'New Training request sent',
            'error'=>false
        ]);

    }



    static function updateTraining($id){
        $obj = self::getById($id); // query()->find($id);
        $data = request()->validate(self::getValidation());

//        dd(request()->all());

        $created_by = Auth::user()->id;

        if ($obj->created_by != $created_by){

            return response()->json([
                'message'=>'Operation not allowed!',
                'error'=>true
            ]);

        }

        if (request()->filled('is_free')){
            $data['is_free'] = request('is_free');
        }


        $obj = $obj->update($data);

        return response()->json([
            'message'=>'New Training request updated',
            'error'=>false
        ]);

    }

    static function removeTraining($id){
        $obj = self::getById($id); // query()->find($id);

        $created_by = Auth::user()->id;

        if ($obj->created_by != $created_by){

            return response()->json([
                'message'=>'Operation not allowed!',
                'error'=>true
            ]);

        }

        if ($obj->status == 1){

            return response()->json([
                'message'=>'Training already approved , cannot remove!',
                'error'=>true
            ]);

        }


        $obj->delete();

        return response()->json([
            'message'=>'Training removed',
            'error'=>false
        ]);

    }


    static function approve($id){
//        $id = $this->id;
        $obj = self::getById($id); // query()->find($id);
        $obj->update([
            'approved'=>1
        ]);

        return response()->json([
            'message'=>'Training approved',
            'error'=>false
        ]);

    }

    static function unApprove($id){
//        $id = $this->id;
        $obj = self::getById($id); // query()->find($id);
        $obj->update([
            'approved'=>2
        ]);

        return response()->json([
            'message'=>'Training un-approved',
            'error'=>false
        ]);

    }



}