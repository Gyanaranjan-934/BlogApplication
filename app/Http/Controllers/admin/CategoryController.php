<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:categories',
        ]);

        $name = $request->input('name');
        $category = new Category();
        $category->name = $name;

        $category->save();
        return redirect()->back()->with('status', 'Category created successfully');
    }
    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request, $category_id)
    {
        $request->validate([
            'name' => 'required | unique:categories',
        ]);
        $category = Category::find($category_id);
        $name = $request->input('name');
        $category->name = $name;

        $category->update();

        return redirect()->back()->with('status', 'Category edited successfully');
    }
    public function destroy($category_id)
    {
        $category = Category::find($category_id);
        $category->delete();
        return redirect('admin/category')->with('status', 'Category deleted successfully');
    }
}
