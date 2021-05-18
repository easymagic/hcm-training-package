<?php


namespace App\Services;


use App\Models\InterviewAssessmentCandidateV2;
use Illuminate\Database\Eloquent\Builder;

class InterviewAssessmentCandidateV2Service
{


    static function mapRecordsToCandidateScore($interviewId,$candidateId){

        $list = self::fetchByInterview($interviewId)->get();

        foreach ($list as $k=>$item){

            $interview_assessment_id = $item->interview_assessment_id;
            //score
            $check = self::fetchByAssessment($interview_assessment_id,$candidateId);

            if ($check->exists()){
                $list[$k]->candidate_score = $check->first()->score;
                continue;
            }

            $list[$k]->candidate_score = 'n/a';

        }

        return $list;

    }


    static function fetchByInterview($interviewId){
        $query = InterviewAssessmentCandidateV2::query();
        $query = $query->whereHas('interview_assessment',function(Builder $builder) use ($interviewId){

            return $builder->whereHas('interview',function(Builder $builder) use ($interviewId){

                return $builder->where('id',$interviewId);

            });

        });

        return $query;
    }



    static function fetch($interviewId,$candidateId){
        return self::fetchByInterview($interviewId)->where('candidate_id',$candidateId);
    }

    //interview_assessment_id

    static function fetchByAssessment($interviewAssessmentId,$candidate_id){

        $query = InterviewAssessmentCandidateV2::query()
            ->where('interview_assessment_id',$interviewAssessmentId)
            ->where('candidate_id',$candidate_id);

        return $query;

    }


    static function getById($id){
        return InterviewAssessmentCandidateV2::query()->find($id);
    }

    static function store(){
       $data = request()->validate([
           'interview_assessment_id'=>'required',
           'score'=>'required',
           'candidate_id'=>'required'
       ]);

       $check = self::fetchByAssessment($data['interview_assessment_id'],$data['candidate_id']);

       if (!$check->exists()){
           $obj = new InterviewAssessmentCandidateV2;
           $obj = $obj->create($data);

           return response()->json([
               'message'=>'New Interview assessment-score saved successfully.',
               'error'=>false
           ]);
       }

       $record = $check->first();

       return self::update($record->id);

    }

    static function update($id){

        $record = self::getById($id);
        $data = request()->validate([
            'interview_assessment_id'=>'required',
            'score'=>'required',
            'candidate_id'=>'required'
        ]);

        $record->update($data);

        return response()->json([
            'message'=>'Interview assessment-score saved.',
            'error'=>false
        ]);

    }

    static function delete($id){

        $record = self::getById($id);

        $record->delete();

        return response()->json([
            'message'=>'Interview assessment removed.',
            'error'=>false
        ]);

    }




}