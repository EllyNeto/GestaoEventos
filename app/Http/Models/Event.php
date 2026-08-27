<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillabel=[
        "tittle",
        "description",
        "city",
        "private",
    ];
}
