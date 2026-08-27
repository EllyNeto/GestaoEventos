<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('product');
    }

    public function create()
    {
        return view('events.create');
    }
}
