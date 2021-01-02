<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryGroup;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;
class BillController extends Controller
{
    public function showBill(Request $request,$id){
        $categories=DB::table('categorygroups')->get();
        $bill=DB::table('bills')->where('id_customer',$id)
        ->join('customers','bills.id_customer','=','customers.id_user')
        ->select('bills.*','customers.customer_name as customerName','customers.ardress as ardress')
        ->distinct()->get();
        if(Session::has('userLogin')){
            return view('shop.bill',compact('categories','bill'));
        }
        else{ 
            return redirect()->route('userGetLogin');
        }
    }

    public function billDetail(Request $request,$id){
        $categories=DB::table('categorygroups')->get();
        $billDetail=DB::table('bill_detail')->where('id_bill',$id)
                            ->join('products','bill_detail.id_product','=','products.id')
                            ->select('bill_detail.*','products.name as productName','products.mainImage as productImage','products.description as description',DB::raw('(bill_detail.unit_price * bill_detail.quantity) as total'))
                            ->get();
        $bills=DB::table('bills')->where('id',$id)->get();

        $customer=DB::table('customers')->where('id',$id)->get();

        return view('shop.bill_detail',compact('categories','billDetail','bills','customer'));
    }

    public function userCancelBill(Request $request,$id){
        $bill=Bill::find($id);
        $bill->status = "Đã Hủy";
        $bill->save();
        return Redirect::back()->with('success','Hủy đơn hàng thành công thành công !!');
    }
}
