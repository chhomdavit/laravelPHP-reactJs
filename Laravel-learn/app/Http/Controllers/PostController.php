<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    // get method
    public function index()
    {
         $categories = Category::pluck('title', 'id')->toArray();
        //  dd($categories);
         $posts =Post::Paginate(3);
         return view('admin.posts.index')->with(['posts' => $posts, 'categories' => $categories]);
    }

    // post method
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

        $post = new Post();
        $post->title = $input['title'];
        $post->category_id = $input['category_id'];
        $post->author_id = 1;
        $post->description = $input['description'];
        $uploadImage = $request->file('selectedImage');
        if (!empty($uploadImage)) {
            $filename = time() . '_' . $uploadImage->getClientOriginalName();
            $uploadImage->storeAs('public/posts', $filename);
            $post->image = $filename;
        }
        $post->save();
        return redirect(route('admin.posts.index'));
    }

    // put method
    public function update(Post $post, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
        ]);
        $input = $request->all();
        $post->title = $input['title'];
        $post->category_id = $input['category_id'];
        $post->author_id = 1;
        $post->description = $input['description'];

        $uploadImage = $request->file('selectedImage');
        if (!empty($uploadImage)) {
            \Illuminate\Support\Facades\Storage::delete('public/posts/' . $post->image);
            $filename = time() . '_' . $uploadImage->getClientOriginalName();
            $uploadImage->storeAs('public/posts', $filename);
            $post->image = $filename;
        }
        $post->save();

        return redirect(route('admin.posts.index'));
    }

    // Remove existing record
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('admin.posts.index'))->with('success', 'post deleted successfully!');
    }

    // complete remove exiting record form table
    public function forceDestroy(Post $post, Request $request)
    {
        \Illuminate\Support\Facades\Storage::disk('public')->delete('posts/' . $post->image);
        $post->forceDelete();
        return redirect(route('admin.posts.index'))->with('success', 'post permanently deleted!');
    }

}
