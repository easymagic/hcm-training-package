<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeparationType extends Model
{
    protected $table='separation_types';
    protected $fillable=['name', 'workflow_id'];

    public function seperations()
    {
    	return $this->hasMany('App\Separation');
    }

    public function workflow()
    {
    	return $this->belongsTo('App\Workflow');
    }


}
