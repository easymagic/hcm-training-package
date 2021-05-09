<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveAllowancePayment extends Model
{
    protected $fillable=['user_id','year','amount','disbursed','approved'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
