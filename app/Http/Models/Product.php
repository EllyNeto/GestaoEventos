<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillabel=[
        "name",
        "category",
        "qty",
        "description",
        "vty",
    ];
}
