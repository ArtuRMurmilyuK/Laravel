<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'price',
    ];

    #получить всех участников
    public function particionals(){
        return $this->morphMany('App\Models\Particional', 'particionalable');
    }
}
