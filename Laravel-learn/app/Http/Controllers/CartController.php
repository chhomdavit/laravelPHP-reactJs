<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{


    // public function index(Request $request)
    // {
    //     $users = User::all();
    //     $carts = Cart::when($request->user_id, function ($query, $user_id) {
    //         return $query->where('author_id', $user_id);
    //     })
    //     ->get();
    //     return view('admin.carts.index', with(['carts' => $carts, 'users'=>$users]));
    // }

    public function index(Request $request)
    {
        $user_id = $request->user_id;

        $users = User::when($request->search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })
        ->when($user_id, function ($query, $user_id) {
            return $query->where('id', $user_id);
        })
        ->get();

        $carts = Cart::when($user_id, function ($query, $user_id) {
            return $query->where('author_id', $user_id);
        })
        ->get();

        return view('admin.carts.index', with(['carts' => $carts, 'users'=>$users]));
    }

    public function addToCart(Request $request)
    {

        $cart = Cart::where('product_id', $request->input('product_id'))
            ->where('author_id', auth()->id())
            ->first();
        if ($cart == null) {
            $cart = new Cart();
            $cart->quantity = 1;
            $cart->product_id = $request->input('product_id');
            $cart->author_id = auth()->id();
        } else {
            $cart->quantity += 1;
        }
        $cart->save();
        return redirect()->back()->with('success', 'add to cart');

    }








}
