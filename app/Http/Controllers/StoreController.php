<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function products()
    {
        return view('products');
    }
}