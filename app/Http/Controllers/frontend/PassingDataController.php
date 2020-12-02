<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CategoryGroup;
use Illuminate\Http\Request;

class PassingDataController extends Controller
{
    public function index(){
        $categories=CategoryGroup::all();
        return view('shop.index',compact('categories'));
    }
}
