<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Particional extends Model
{
    protected $table = 'particionalable';
    protected $fillable = ['user_id'];

    public function particionalable(){
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
