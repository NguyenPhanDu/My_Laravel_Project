<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\CategoryGroup;
use Session;
class CartController extends Controller
{
    public function addCart(Request $request,$id){
        $categories=DB::table('categorygroups')->get();
        $product=DB::table('products')->where('id',$id)->first();
        if($product!=null){
            if(Session('cart')!=null){
                $presentCart = Session('cart');
            }
            else{
                $presentCart = null;
            }

            $newCart=new Cart($presentCart);
            $newCart->addCart($product, $id);
            $request->Session()->put('cart', $newCart);
        }
        return view('shop.cart',compact('categories'));
    }

    public function viewListCart(){
        $categories=DB::table('categorygroups')->get();
        return view('shop.list_cart',compact('categories'));
    }

    public function deleteListCartItem(Request $request, $id){
        if(Session('cart')!=null){
            $presentCart = Session('cart');
        }
        else{
            $presentCart = null;
        }
        $newCart=new Cart($presentCart);
        $newCart->deleteItemCart($id);
        if(Count($newCart->products)>0){
            $request->Session()->put('cart',$newCart);
        }
        else{
            $request->Session()->forget('cart');
        }
        return view('shop.list_cart_item');
    }
}
