<?php


namespace App\Services;


use App\Models\InterviewAssessmentCandidateV2;
use App\Services\Interfaces\InterviewAssessmentCandidateV2ServiceInterface;
use App\User;
use Illuminate\Database\Eloquent\Builder;

class InterviewAssessmentCandidateV2Service
{

    static function fetchCandidates(InterviewAssessmentCandidateV2ServiceInterface $interface){
        return $interface::fetchCandidates();
//        return User::query();
    }

    static function getJobRoles(InterviewAssessmentCandidateV2ServiceInterface $interface){
        // TODO: Implement getJobRoles() method.
        return $interface::getJobRoles();
//        $list = [];
//
//        $job = new \stdClass();
//        $job->name = 'Senior Developer';
//        $job->id = 1;
//
//        $list[] = $job;
//
//        $job = new \stdClass();
//        $job->name = 'Junior Developer';
//        $job->id = 2;
//
//        $list[] = $job;
//
////        dd($list);
//
//        return $list;
    }

    static function getCandidate($candidateId){
        return User::query()->find($candidateId);
    }


    static function mapRecordsToCandidateScore($interviewId,$candidateId){

//        dd(90);
        $list = self::fetchTemplateByInterView($interviewId)->get();

//        dd($list);

        foreach ($list as $k=>$item){

            $interview_assessment_id = $item->id;
            //score
            $check = self::fetchByAssessment($interview_assessment_id,$candidateId);

            if ($check->exists()){
                $list[$k]->candidate_score = $check->first()->score;
                continue;
            }

            $list[$k]->candidate_score = '0.0';

        }

//        dd($list);

        return $list;

    }

    static function fetchTemplateByInterView($interviewId){
        $query = InterviewAssessmentV2Service::fetch($interviewId);
        return $query;
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