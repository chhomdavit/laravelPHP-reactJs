<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function home()
    {
        $posts = post::all();
        return view('pages.home', ['posts' => $posts]);
    }

    public function about()
    {
        return view('pages.about');
    }
}
