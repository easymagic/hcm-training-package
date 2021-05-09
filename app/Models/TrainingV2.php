<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingV2 extends Model
{
    //

    protected $fillable = ['name','year','cost','is_free','type','resource_link','approved','start_date','stop_date',
        'created_by','department_id'];




    static function getDepartments(){

        $dep1 = new \stdClass();
        $dep1->name = 'IT Department';
        $dep1->id = 1;

        $dep2 = new \stdClass();
        $dep2->name = 'Admin Department';
        $dep2->id = 2;

        return [ $dep1 , $dep2 ];

    }

    static function getFactory(){
        return new self;
    }

    static function getValidation(){
        return [
               'name'=>'required',
                'year'=>'',
            'cost'=>'required',
            'is_free'=>'required',
            'type'=>'required', //online or physical
            'resource_link'=>'required',
            'start_date'=>'required',
            'stop_date'=>'required',
            'department_id'=>'required',
            'created_by'=>'required'

            ];
    }

    static function createTraining(){

    }

    static function updateTraining($id){

    }






}
