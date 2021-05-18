<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterviewAssessmentV2 extends Model
{
    //
    protected $fillable = ['interview_id','competency','max_rating'];

    function interview(){
        return $this->belongsTo(InterviewV2::class,'interview_id');
    }




}
