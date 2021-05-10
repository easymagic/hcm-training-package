<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingV2 extends Model
{
    //

    protected $fillable = ['name','year','cost','is_free','type','resource_link','approved','start_date','stop_date',
        'created_by','department_id','workflow_id'];




    static function getDepartments(){

        $dep1 = new \stdClass();
        $dep1->name = 'IT Department';
        $dep1->id = 1;

        $dep2 = new \stdClass();
        $dep2->name = 'Admin Department';
        $dep2->id = 2;

        return [ $dep1 , $dep2 ];

    }

    static function getFactory(){
        return new self;
    }

    static function getValidation(){
        return [
               'name'=>'required',
                'year'=>'',
            'cost'=>'required',
            'is_free'=>'required',
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

        $workFlow = ModuleApproval::getWorkFlowByName($workFlowName);
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

      $obj = $obj->create($data);

      return response()->json([
          'message'=>'New Training request sent',
          'error'=>false
      ]);

    }

    static function updateTraining($id){
      $obj = self::query()->find($id);
      $data = request()->validate(self::getValidation());
      $obj = $obj->update($data);

        return response()->json([
            'message'=>'New Training request updated',
            'error'=>false
        ]);

    }

    static function removeTraining($id){
        $obj = self::query()->find($id);
        $obj->delete();

        return response()->json([
            'message'=>'Training removed',
            'error'=>false
        ]);

    }


    static function approve($id){
        $obj = self::query()->find($id);
        $obj->update([
            'approved'=>1
        ]);

        return response()->json([
            'message'=>'Training approved',
            'error'=>false
        ]);

    }

    static function unApprove($id){
        $obj = self::query()->find($id);
        $obj->update([
            'approved'=>0
        ]);

        return response()->json([
            'message'=>'Training un-approved',
            'error'=>false
        ]);

    }




}
