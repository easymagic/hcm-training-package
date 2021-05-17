<?php


namespace App\Services;


use App\Models\TrainingUserV2;
use http\Env\Response;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class TrainingUserV2Service
{

  static function getById($id){
      return TrainingUserV2::query()->find($id);
  }

  static function fetch(){
      $query = TrainingUserV2::query();
      if (request()->filled('user')){
          $query = $query->whereHas('user',function(Builder $builder){
              return $builder->where('email','like','%' . request('user') . '%');
          });
      }
      return $query;
  }


    static function store(){

        $data = request()->validate([
            'training_id'=>'required',
            'user_ids'=>'required'
        ]);

//        dd($data);


        foreach ($data['user_ids'] as $user_id){

            $obj = new TrainingUserV2;
            $obj = $obj->create([
                'training_id'=>$data['training_id'],
                'user_id'=>$user_id
            ]);

        }

        return response()->json([
            'message'=>'Course enrolled successfully.',
            'error'=>false
        ]);

    }

    static function updateRecord($id){ //for users

        $user_id = Auth::user()->id;
        $record = self::getById($id);

        $data = request()->validate([
            'feedback'=>'required',
            'rating'=>'required'
        ]);

        if ($user_id != $record->user_id){
            return response()->json([
                'message'=>'Operation not allowed!',
                'error'=>true
            ]);
        }

        //accepted

        if (request()->filled('accepted')){

            $data['accepted'] = 1;

        }

        if (request()->file('document_upload')){

            $document_upload = request()->file('document_upload')->store('',[
                'disk'=>'uploads'
            ]);

            $data['document_upload'] = $document_upload;

//            $record->update([
//                'document_upload'=>$document_upload,
//                'feedback'=>$data['feedback'],
//                'rating'=>$data['rating']
//            ]);

        }

        $record->update($data);

//        $record->update([
//            'feedback'=>$data['feedback'],
//            'rating'=>$data['rating']
//        ]);


        return response()->json([
            'message'=>'Feedback submitted',
            'error'=>false
        ]);

    }

    static function deleteRecord($id){

        $record = self::getById($id); // query()->find($id);

        if ($record->accepted == 1){
            return \response()->json([
                'message'=>'This invitation has already been accepted, cannot remove!',
                'error'=>true
            ]);
        }

        $record->delete();

        return response()->json([
            'message'=>'Recommendation removed.',
            'error'=>true
        ]);

    }




}