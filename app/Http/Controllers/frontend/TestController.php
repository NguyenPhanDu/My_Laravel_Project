<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryGroup;
class TestController extends Controller
{
    public function pushData(){
        $catgroups=CategoryGroup::all();
        return view('user.index',compact('catgroups'));
    }
}
