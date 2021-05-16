<?php


namespace App\Services;


use App\Models\TrainingUserV2;

class TrainingUserV2Service
{

  static function fetch(){
      return TrainingUserV2::query();
  }



}