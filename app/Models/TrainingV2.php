<?php

namespace App\Models;

use App\Interfaces\ModuleApprovalInterface;
use App\Traits\WorkFlowableTrait;
use App\User;
use Illuminate\Database\Eloquent\Model;

class TrainingV2 extends Model implements ModuleApprovalInterface
{

//    use WorkFlowableTrait;
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

    function getApprovedNameAttribute(){
        if ($this->approved == 0){
            return 'Pending';
        }
        if ($this->approved == 1){
            return  'Approved';
        }
        return  'Cancelled';
    }

    function department(){

    }

    static function getFactory(){
        return new self;
    }

    static function getValidation(){
        return [
               'name'=>'required',
                'year'=>'required',
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

      ModuleApproval::firstTimeCreate([
       'stage_id'=>ModuleApproval::getFirstStageForWorkflow($workFlowName)->first()->id,
       'module'=>self::class,
       'module_id'=>$obj->id,
       'comments'=>'...'
      ]);

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


    function approve(){
        $id = $this->id;
        $obj = self::query()->find($id);
        $obj->update([
            'approved'=>1
        ]);

        return response()->json([
            'message'=>'Training approved',
            'error'=>false
        ]);

    }

    function unApprove(){
        $id = $this->id;
        $obj = self::query()->find($id);
        $obj->update([
            'approved'=>2
        ]);

        return response()->json([
            'message'=>'Training un-approved',
            'error'=>false
        ]);

    }


    function getNarration(){
        return $this->name . ' (' . $this->start_date . ' - ' . $this->stop_date .  ') ';
    }


    function notifyRejected($users)
    {
        $this->unApprove();
//        dd('Rejected',$users);
        // TODO: Implement notifyRejected() method.
    }

    function notifyFinalApproved($users)
    {
        $this->approve();
        // TODO: Implement notifyFinalApproved() method.
    }

    function notifyApproved($users)
    {
        // TODO: Implement notifyApproved() method.
    }

    function getPreviewLink()
    {
        // TODO: Implement getPreviewLink() method.
    }

    function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    function getSubscribers()
    {
        // TODO: Implement getSubscribers() method.
    }
}
