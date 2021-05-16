<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TrainingUserV2 extends Model
{
    //

    protected $fillable = ['training_id','user_id','rating','feedback','document_upload','accepted'];


    function training(){
        return $this->belongsTo(TrainingV2::class,'training_id');
    }

    function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    function getAcceptedNameAttribute(){
        if (is_null($this->accepted)){
            return 'Pending';
        }
        if ($this->accepted == 0){
            return  'Rejected';
        }
        return  'Accepted';
    }



}
