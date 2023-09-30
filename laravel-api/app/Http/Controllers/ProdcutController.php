<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdcutController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $products = product::all();
        return response()->json([
            'list_products' => $products,
            'list_categories' => $categories
        ]);
    }

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
        $product = new product();
        $product->title = $input['title'];
        $product->price = $input['price'];
        $product->category_id = $input['category_id'];
        $product->author_id = 1;
        $product->description = $input['description'];

        $uploadImage = $request->file('image');
        if (!empty($uploadImage)) {
            $filename = time() . '_' . $uploadImage->base64_decode();
            $uploadImage->storeAs('public/posts', $filename);
            $product->image = $filename;
        }

        // $uploadImage = $request->file('image');
        // if (!empty($uploadImage)) {
        //     $filename = time() . '_' . $uploadImage->getClientOriginalName();
        //     $uploadImage->storeAs('public/posts', $filename);
        //     $product->image = $filename;
        // }



        if ($product->save()) {
            return response()->json([
                'message' => 'product created successfully',
                'products' => $product,
                'status' => 201,
            ]);
        } else {
            return response()->json(['error' => 'Failed to create post'], 500);
        }
    }

    public function update(Product $product, Request $request) {
        if (!$request->has('title')) {
            return response()->json([
                'title' => 'Title is required!'
            ]);
        }

        $input = $request->all();
        $product->title = $input['title'];
        $product->price = $input['price'];
        $product->category_id = $input['category_id'];
        $product->description = $input['description'];

        $uploadImage = $request->file('image');
if (!empty($uploadImage)) {
    Storage::delete('public/posts/' . $product->image);
    $path = 'myfolder/myimage.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    $product->image = $base64;
}

        if ($product->save()) {
            return response()->json([
                'message' => 'product updated successfully',
                'products' => $product,
                'status' => 200
                ]);
        } else {
            return response()->json(['error' => 'Failed to update post'], 500);
        }
    }

    // public function destroy(Product $product)
    // {
    //     $product->delete();
    //     return response()->json(['message' => 'Product deleted successfully!'], 200);
    // }

    public function forceDestroy(Product $product)
    {
        Storage::disk('public')->delete('posts/' . $product->image);
        $product->forceDelete();
        return response()->json(['message' => 'Category permanently deleted!'], 200);
    }
}
