<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\CategoryGroup;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
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
        $categories=DB::table('categorygroups')->get();
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
        return view('shop.list_cart_item',compact('categories'));
    }

    public function saveListCartItem(Request $request, $id, $quantity){
        $categories=DB::table('categorygroups')->get();
        if(Session('cart')!=null){
            $presentCart = Session('cart');
        }
        else{
            $presentCart = null;
        }
        $newCart=new Cart($presentCart);
        $newCart->updateCart($id, $quantity);
        $request->Session()->put('cart',$newCart);
        return view('shop.list_cart_item',compact('categories'));
    }

    public function clearCart(Request $request){
        $categories=DB::table('categorygroups')->get();
        if(Session('cart')!=null){
            $presentCart = Session('cart');
        }
        else{
            $presentCart = null;
        }

        $request->Session()->forget('cart');
        return view('shop.list_cart',compact('categories'));
    }

    public function postCheckout(Request $request){
        $user=Session::get('userLogin')->id;
        $cart=Session::get('cart');

        $customer=new Customer;
        $customer->customer_name=$request->customer_name;
        $customer->sex=$request->gender;
        $customer->phone_number=$request->customer_phone;
        $customer->customer_email=$request->customer_email;
        $customer->ardress=$request->adress;
        $customer->id_user=$user;

        $customer->save();
        
        $bill=new Bill;
        $bill->id_customer=$customer->id_user;
        $bill->total=$cart->totalPrice;
        $bill->status="Chờ xử lý";
        $bill->status_giaohang="Chưa giao hàng";

        $bill->save();

        foreach($cart->products as $item){
            $billDetail=new BillDetail;
            $billDetail->id_bill=$bill->id;
            $billDetail->id_product = $item['productInfo']->id;
            $billDetail->quantity=$item['quantity'];
            $billDetail->unit_price =$item['productInfo']->price;
            $billDetail->save();
        }
        Session::forget('cart');
        $request->Session()->put('bill');

        return redirect()->route('showBill',Session::get('userLogin')->id);
    }
}   
