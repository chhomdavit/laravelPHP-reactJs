<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'status' => 200,
            'list_categories' => $categories
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);
        $category = Category::create(
            $request->only(
                'title',
                'description'
            ));
        return response()->json(['message' => 'Category create successfully!'], 201);
    }


    public function update(Category $category, Request $request)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'nullable|string'
        // ]);
        // $category->update($request->only('title', 'description'));
        // return response()->json([
        //     'message' => 'Update is successfully',
        //     'status' => 200,
        // ]);

        if (!$request->has('title')) {
            return back()->withErrors([
                'title' => 'Title is required!'
            ]);
        }
        $input = $request->all();
        $category->title = $input['title'];
        $category->description = $input['description'];
        $category->save();

        return response()->json([
            "message" => "Category updated successfully.",
            "data" => $category
        ]);
    }


    public function destroy(category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully!'], 200);
    }

    // public function forceDestroy(category $category)
    // {
    //     $category->forceDelete();
    //     return response()->json(['message' => 'Category permanently deleted!'], 200);
    // }
}
