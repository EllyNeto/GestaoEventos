<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable=[
        "tittle",
        "description",
        "city",
        "private",
        "items",
    ];

    protected $casts = [
        'items' => 'array',
    ];

    protected $dates= [
        'date'
    ];

    public function user()
    {
        return $this->belongsTo('App\Http\Models\User');
    }

    protected $guarded= [];

    public function users()
    {
        return $this->belongsToMany('App\Http\Models\User');
    }
}
