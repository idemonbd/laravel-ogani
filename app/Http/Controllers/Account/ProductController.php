<?php

namespace App\Http\Controllers\Account;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('back.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('back.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categories' => 'required',
            'name' => 'required|string',
            'price' => 'integer',
            'image' => 'image',
        ]);

        $product = new Product($request->only(['name','description','price']));
        if ($request->has('images')) {
            $images = [];
            foreach($request->images as $image){
                $newImg = $image->store('product');
                array_push($images,$newImg);
            }
            $product->images = $images;
        }
        $product->save();
        $product->categories()->attach($request->categories);

        Toastr::success('Product added successfully', 'Success');
        return redirect(route('account.products.index'));
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::parents();
        return view('back.product.edit', compact('categories','product'));
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        $product->delete();
        Toastr::success('Product deleted successfully', 'Success');
        return back();
    }
}
