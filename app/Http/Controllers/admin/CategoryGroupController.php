<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryGroup;
use Illuminate\Http\Request;

class CategoryGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryGroups=CategoryGroup::all();
        return view('admin.categoryGroup.index',compact('categoryGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categoryGroup.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        CategoryGroup::create($request->all());
        return redirect()->route('catgroup.index')->with('success','Thêm danh mục mới thành công !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryGroup  $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryGroup $categoryGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryGroup  $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryGroup=CategoryGroup::find($id);
        return view('admin.categoryGroup.edit',compact('categoryGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryGroup  $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoryGroup=CategoryGroup::find($id);
        $request->validate([
            'name'=>'required'
        ]);
        $categoryGroup->update($request->all());
        return redirect()->route('catgroup.index')->with('success','Chỉnh danh mục mới thành công !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryGroup  $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryGroup=CategoryGroup::find($id);
        $categoryGroup->delete();
        return redirect()->route('catgroup.index')
                        ->with('success','Xóa danh mục thành công');
    }
}
