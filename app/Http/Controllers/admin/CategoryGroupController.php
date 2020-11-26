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
        CategoryGroup::created($request->all());
        return redirect()->route('catgroup.index')->with('success','Thêm danh mục thành công!');
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
    public function edit(CategoryGroup $categoryGroup)
    {
        return view('admin.categoryGroup.edit',compact('categoryGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryGroup  $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryGroup $categoryGroup)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $categoryGroup->update($request->all());
        return redirect()->route('catgroup.index')->with('success','Chỉnh sửa danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryGroup  $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryGroup $categoryGroup)
    {
        $categoryGroup->delete();
        return redirect()->route('catgroup.index')
                        ->with('success','Product deleted successfully');
    }
}
