<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
    	
    	return view('shops.index');
    }
    public function edit()
    {
    	
    	return view('shops.edit');
    }
}
