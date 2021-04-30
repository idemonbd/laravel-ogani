<?php

namespace App\Http\Controllers\Account;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('back.category.index', compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);
        
        $category = new Category($request->except(['image']));
        if ($request->hasFile('image')) {
            $category->image = $request->image->store('category');
        }
        
        $category->save();

        Toastr::success('Category added successfully', 'Success');
        return back();
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Toastr::success('Category deleted successfully', 'Success');
        return back();
    }
}
