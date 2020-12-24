<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Classes\Cart;
use Session;
class IndexController extends Controller
{
    public function index()
    {
        $newArrials=DB::table('products')->orderBy('id','desc')->take(9)->get();
        $categories=DB::table('categorygroups')->get();
        $products=DB::table('products')->get();
        return view('shop.index',compact('newArrials','categories','products'));
    }

    public function product($id)
    {   $product=DB::table('products')->where('id',$id)->get();
        $categories=DB::table('categorygroups')->get();
        return view('shop.product',compact('categories','product'));
    }
}
