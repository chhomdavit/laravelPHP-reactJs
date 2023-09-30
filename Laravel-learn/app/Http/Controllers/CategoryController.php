<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Get list of data
    public function index()
    {
        $categories = Category::Paginate(2);
         return view('admin.categories.index')->with('categories', $categories);
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
        return redirect(route('admin.categories.index'));
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
        return redirect(route('admin.categories.index'));
    }

    // Remove existing record
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('admin.categories.index'))->with('success', 'Category deleted successfully!');
    }

    // complete remove exiting record form table
    public function forceDestory()
    {

    }
}
