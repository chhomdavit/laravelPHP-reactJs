<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Get list of data
    public function index()
    {
         $categories = category::get();
         return view('categories.index')->with('categories', $categories);
    }

    // show create form
    public function create()
    {
        return view('categories.create');
    }

    // create new record from submit data
    public function store(Request $request)
    {
        if (!$request->has('title')) {
            return back()->withErrors([
                'title' => 'Title is required!'
            ]);
        }
        $input = $request->all();
        // dd($input);
        $category = new Category();
        $category->title = $input['title'];
        $category->description = $input['description'];
        $category->save();
        return redirect(route('categories.index'));
    }


    // Display detail information
    public function show()
    {

    }

    // show edit form
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    // update existing record form submit data
    public function update(Category $category, Request $request)
    {
        if (!$request->has('title')) {
            return back()->withErrors([
                'title' => 'Title is required!'
            ]);
        }
        $input = $request->all();
        $category->title = $input['title'];
        $category->description = $input['description'];
        $category->save();
        return redirect(route('categories.index'));
    }

    // Remove existing record
    public function destroy()
    {

    }

    // complete remove exiting record form table
    public function forceDestory()
    {

    }
}
