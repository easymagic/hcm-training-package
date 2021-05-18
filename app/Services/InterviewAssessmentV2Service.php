<?php


namespace App\Services;


use App\Models\InterviewAssessmentV2;

class InterviewAssessmentV2Service
{

    static function getById($id){
        return InterviewAssessmentV2::query()->find($id);
    }

    static function fetch($interviewId){
        $query = InterviewAssessmentV2::query()->where('interview_id',$interviewId);

        return $query;
    }

    static function store(){

        $data = request()->validate([
            'interview_id'=>'required',
            'competency'=>'required',
            'max_rating'=>'required'
        ]);

        $obj = new InterviewAssessmentV2;
        $obj = $obj->create($data);

        return response()->json([
            'message'=>'Interview question added successfully.',
            'error'=>false
        ]);

    }

    static function update($id){

        $record = self::getById($id);
        $data = request()->validate([
            'interview_id'=>'required',
            'competency'=>'required',
            'max_rating'=>'required'
        ]);

        $record->update($data);

        return response()->json([
            'message'=>'Interview question updated successfully.',
            'error'=>false
        ]);

    }

    static function delete($id){

        $record = self::getById($id);
        $record->delete();

        return response()->json([
            'message'=>'Interview question added successfully.',
            'error'=>false
        ]);

    }

}