<?php

namespace App\Models;

use App\Interfaces\ModuleApprovalInterface;
use App\Services\TrainingV2Service;
use App\Traits\WorkFlowableTrait;
use App\User;
use Illuminate\Database\Eloquent\Model;

class TrainingV2 extends Model implements ModuleApprovalInterface
{

//    use WorkFlowableTrait;
    //

    protected $fillable = ['name','year','cost','is_free','type','resource_link','approved','start_date','stop_date',
        'created_by','department_id','workflow_id'];


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

    function getNarration(){
        return $this->name . ' (' . $this->start_date . ' - ' . $this->stop_date .  ') ';
    }



    function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    function getSubscribers()
    {
        // TODO: Implement getSubscribers() method.
    }

    function notifyRejected($id,$users)
    {
        // TODO: Implement notifyRejected() method.
        TrainingV2Service::unApprove($id);
    }

    function notifyFinalApproved($id, $users)
    {
        // TODO: Implement notifyFinalApproved() method.
        TrainingV2Service::approve($id);

    }

    function notifyApproved($id, $users)
    {
        // TODO: Implement notifyApproved() method.
    }

    function getPreviewLink()
    {
        // TODO: Implement getPreviewLink() method.
    }
}
