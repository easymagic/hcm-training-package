<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class InterviewAssessmentCandidateV2 extends Model
{
    //
    protected $fillable = ['interview_assessment_id','score','candidate_id'];


    function interview_assessment(){
        return $this->belongsTo(InterviewAssessmentV2::class,'interview_assessment_id');
    }

    function candidate(){
        return $this->belongsTo(User::class,'candidate_id');
    }

}
