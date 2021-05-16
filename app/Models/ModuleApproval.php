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
