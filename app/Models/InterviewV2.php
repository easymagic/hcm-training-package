<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class InterviewV2 extends Model
{
    //
    protected $fillable = ['job_role_id','name','interviewer'];

    function interviewer_user(){
        return $this->belongsTo(User::class,'interviewer');
    }




}
