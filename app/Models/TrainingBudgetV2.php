<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingBudgetV2 extends Model
{
    //
    protected $fillable = ['year','amount'];

    static function getValidation(){
        return [
            'year'=>'required',
            'amount'=>'required'
        ];
    }

    static function getFactory(){
        return new self;
    }

    static function createTrainigBudget(){
     $data = request()->validate(self::getValidation());
     $obj = self::getFactory()->create($data);
     return response()->json([
         'message'=>'Training buget added successfully',
         'error'=>false
     ]);

    }

    static function updateTrainigBudget($id){
        $obj = self::query()->find($id);
        $data = request()->validate(self::getValidation());
        $obj = $obj->update($data);
        return response()->json([
            'message'=>'Training buget updated successfully',
            'error'=>false
        ]);

    }



    static function removeTrainigBudget($id){
        $obj = self::query()->find($id);
        $obj->delete();
        return response()->json([
            'message'=>'Training buget removed successfully',
            'error'=>false
        ]);

    }

}
