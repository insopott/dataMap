<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Towns extends Model
{
    protected $fillable=['name','slug'];
    public  function images(){
        return $this->hasMany('App\Images','town_id','id');
    }
}
