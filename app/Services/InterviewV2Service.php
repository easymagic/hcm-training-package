<?php


namespace App\Services;


use App\Models\InterviewV2;
use App\Services\Interfaces\InterviewV2ServiceInterface;
use App\User;

class InterviewV2Service
{

    static function fetch(){
        $query = InterviewV2::query();

        if (request()->filled('name_search')){
            $query = $query->where('name','like','%' . request('name_search') . '%');
        }

        return $query;
    }

    static function getById($id){
        return InterviewV2::query()->find($id);
    }

    static function getJobRoles(InterviewV2ServiceInterface $interface){

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
//        return $list;

    }

    static function getInterviewers(InterviewV2ServiceInterface $interface){
        return $interface::getInterviewers();
        //return User::query()->get();
    }

    static function store(){
        $data = request()->validate([
            'job_role_id'=>'required',
            'name'=>'required',
            'interviewer'=>'required'
        ]);

        $obj = new InterviewV2;
        $obj = $obj->create($data);

        return response()->json([
            'message'=>'Interview created successfully',
            'error'=>false
        ]);

    }

    static function update($id){
      $record = self::getById($id);
      $data = request()->validate([
          'job_role_id'=>'required',
          'name'=>'required',
          'interviewer'=>'required'
      ]);
      $record->update($data);

      return response()->json([
          'message'=>'Interview updated successfully.',
          'error'=>false
      ]);

    }

    static function destroy($id)
    {
        $record = self::getById($id);
        $record->delete();

        return response()->json([
            'message' => 'Interview removed successfully.',
            'error' => false
        ]);

    }



}