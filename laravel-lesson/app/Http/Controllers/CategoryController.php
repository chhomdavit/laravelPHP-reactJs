<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Get list of data
    public function index()
    {
         $categories = CategoryModel::get();
         return view('categories.index');
    }

    // show create form
    public function create()
    {

    }

    // create new record from submit data
    public function store()
    {

    }


    // Display detail information
    public function show()
    {

    }

    // show edit form
    public function edit()
    {

    }

    // update existing record form submit data
    public function update()
    {

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
