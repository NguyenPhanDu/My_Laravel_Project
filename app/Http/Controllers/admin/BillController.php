<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;
class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills=DB::table('bills')
                    ->join('customers','bills.id','=','customers.id')
                    ->get();
        return view('admin.bill.index',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $billDetail=DB::table('bill_detail')->where('id_bill',$id)
                            ->join('products','bill_detail.id_product','=','products.id')
                            ->select('bill_detail.*','products.name as productName','products.mainImage as productImage',DB::raw('(bill_detail.unit_price * bill_detail.quantity) as total'))
                            ->get();
        
        $bills=DB::table('bills')->where('id',$id)->first();

        $customer=DB::table('customers')->where('id',$id)->first();
        return view('admin.bill.edit',compact('customer','bills','billDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bill = Bill::find($id);
        $bill->status = "Đã xác nhận";
        $bill->save();
        return redirect()->route('bill.index')->with('success','Xác nhận đơn hàng thành công thành công !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
