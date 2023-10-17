<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::pluck('title', 'id')->toArray();
        $product =Product::Paginate(3);
        return view('admin.products.index')->with(['products' => $product, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$request->has('title')) {
            return back()->withErrors([
                'title' => 'Title is required!'
            ]);
        }
        if (!$request->has('category_id')) {
            return back()->withErrors([
                'category_id' => 'category_id is required!'
            ]);
        }
        $input = $request->all();

        $product = new Product();
        $product->title = $input['title'];
        $product->price = $input['price'];
        $product->category_id = $input['category_id'];
        $product->author_id = auth()->id();
        $product->description = $input['description'];
        $uploadImage = $request->file('selectedImage');
        if (!empty($uploadImage)) {
            $filename = time() . '_' . $uploadImage->getClientOriginalName();
            $uploadImage->storeAs('public/products', $filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect(route('admin.products.index'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
        ]);
        $input = $request->all();
        $product->title = $input['title'];
        $product->price = $input['price'];
        $product->category_id = $input['category_id'];
        $product->author_id = auth()->id();
        $product->description = $input['description'];

        $uploadImage = $request->file('selectedImage');
        if (!empty($uploadImage)) {
            Storage::delete('public/products/' . $product->image);
            $filename = time() . '_' . $uploadImage->getClientOriginalName();
            $uploadImage->storeAs('public/posts', $filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect(route('admin.products.index'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function forceDestroy(Product $product, Request $request)
    {
        Storage::disk('public')->delete('product/' . $product->image);
        $product->forceDelete();
        return redirect(route('admin.products.index'))->with('success', 'post permanently deleted!');
    }
}
