<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TrainingUserV2 extends Model
{
    //

    protected $fillable = ['training_id','user_id','rating','feedback','document_upload'];


    function training(){
        return $this->belongsTo(TrainingV2::class,'training_id');
    }

    function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    static function store(){

        $data = request()->validate([
            'training_id'=>'required',
            'user_ids'=>'required'
        ]);


        foreach ($data['user_ids'] as $user_id){

            $obj = new self;
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
        $record = self::query()->find($id);

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


        if (request()->file('document_upload')->isValid()){

            $document_upload = request()->file('document_upload')->store('',[
                'disk'=>'uploads'
            ]);

            $record->update([
                'document_upload'=>$document_upload,
                'feedback'=>$data['feedback'],
                'rating'=>$data['rating']
            ]);

        }

        $record->update([
            'feedback'=>$data['feedback'],
            'rating'=>$data['rating']
        ]);


        return response()->json([
            'message'=>'Feedback submitted',
            'error'=>false
        ]);

    }

    static function deleteRecord($id){

        $record = self::query()->find($id);

        $record->delete();

        return response()->json([
            'message'=>'Recommendation removed.',
            'error'=>true
        ]);

    }


}
