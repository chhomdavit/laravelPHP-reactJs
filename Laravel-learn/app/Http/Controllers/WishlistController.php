<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index()
    {
        $product = Product::pluck('price','title', 'id')->toArray();
        $wishlist = Wishlist::get();
        return view('admin.wishlists.index')->with(['wishlists' => $wishlist, 'products'=>$product]);
    }


    public function addToWishlist(Request $request)
    {

        $wishlist = Wishlist::where('product_id', $request->input('product_id'))
            ->where('author_id', auth()->id())
            ->first();

        if ($wishlist) {
            return redirect()->back()->with('error', 'already in wishlist');
        }

        $wishlist = new Wishlist();
        $wishlist->product_id = $request->input('product_id');
        $wishlist->author_id = auth()->id();

        $wishlist->save();
        return redirect()->back()->with('success', 'add to wishlist');

    }

    public function forceDestroy(Wishlist $wishlist, Request $request)
    {
        $wishlist->forceDelete();
        return redirect(route('admin.wishlists.index'))->with('success', 'post permanently deleted!');
    }










}
