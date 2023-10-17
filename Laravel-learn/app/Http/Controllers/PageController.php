<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\Profile;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    //
    public function home()
    {
        $products = Product::all();
        return view('pages.home', ['products' => $products]);
    }

    public function about()
    {
        return view('pages.about');
    }




    // ផ្នែក​ Cart Controller
    public function indexCart()
    {
        $product = Product::pluck('image','price','title', 'id')->toArray();
        $cart = Auth::user()->cart;
        return view('pages.cart.index')->with(['carts' => $cart, 'product'=>$product]);
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

    public function updateCart(Request $request, Cart $cart)
    {
        $carts = Cart::find($cart);
        foreach ($carts as $cart) {
            $cart->quantity = $request->input('quantity');
            $cart->save();
        }
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function forceDestroyCart(Cart $cart, Request $request)
    {
        $cart->forceDelete();
        return redirect(route('pages.cart.index'))->with('success', 'delete success!');
    }




    // ផ្នែក​ Checkout Controller
    public function indexCheckout()
    {
        if(Cart::count() == 0 ){
            return redirect()->route('pages.cart.index');
        }

        $product = Product::pluck('image','price','title', 'id')->toArray();
        $cart = Auth::user()->cart;
        return view('pages.checkout.index')->with(['carts' => $cart, 'product'=>$product]);
    }

    public function storeCheckout(Request $request)
    {
        $order = new Order();
        $order->order_status_id = 1;
        $order->payment_method_id = 1;
        $order->author_id = auth()->id();
        $order->bill = $request->input('bill');
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');

        if($order->save()){
            $carts = Cart::where('author_id', auth()->id())->get();

            foreach($carts as $item)
            {
               $orderProduct = new ProductOrder();
               $orderProduct->product_id = $item->product_id;
               $orderProduct->author_id = auth()->id();
               $orderProduct->quantity = $item->quantity;
               $orderProduct->order_id = $order->id;
               $orderProduct->save();
               $item->delete();

            }
        }
        return redirect()->route('pages.cart.index');
    }









    // ផ្នែក​ Wishlist Controller
    public function indexWishlist()
    {
        $product = Product::pluck('image','price','title', 'id')->toArray();
        $wishlist = Auth::user()->wishlist;
        return view('pages.wishlist.index')->with(['wishlists' => $wishlist, 'product'=>$product]);
    }

    public function forceDestroyWishlist(Wishlist $wishlist, Request $request)
    {
        $wishlist->forceDelete();
        return redirect(route('pages.wishlist.index'))->with('success', 'delete success!');
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







    // ================ ផ្នែក​ Profile Controller =======================
    public function index()
    {
        $user =User::pluck('password','name','email','id')->toArray();
        $profile = Auth::user()->profile;
        return view('pages.profile.index')->with(['profiles' => $profile, 'users' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_desc' => 'required',
            'selectedImage' => 'nullable|image'
        ]);

        $profile = Profile::where('author_id', auth()->id())->first();
        if ($profile) {
            return back()->withErrors([
                'profile' => 'You already have a profile!'
            ]);
        }

        $profile = new Profile();
        $profile->author_id = auth()->id();
        $profile->telephone = $request->input('telephone');
        $profile->address_desc = $request->input('address_desc');

        $uploadImage = $request->file('selectedImage');
        if ($uploadImage) {
            $filename = time() . '_' . $uploadImage->getClientOriginalName();
            $uploadImage->storeAs('public/profiles', $filename);
            $profile->image = $filename;
        }

        $profile->save();
        return redirect(route('pages.profile.index'))->with('success', 'create success!');
    }

    public function update(Profile $profile, Request $request)
    {
        $request->validate([
            'address_desc' => 'required',
            'telephone' => 'required',
            'selectedImage' => 'nullable|image'
        ]);

        $request->all();

        $profile->author_id = auth()->id();
        $profile->address_desc = $request->input('address_desc');
        $profile->telephone = $request->input('telephone');


        $uploadImage = $request->file('selectedImage');
        if (!empty($uploadImage)) {
            Storage::delete('public/profiles/' . $profile->image);
            $filename = time() . '_' . $uploadImage->getClientOriginalName();
            $uploadImage->storeAs('public/profiles', $filename);
            $profile->image = $filename;
        }
        $profile->save();
        return redirect(route('pages.profile.index'))->with('success', 'update success!');
    }

    public function forceDestroy(Profile $profile, Request $request)
    {
        Storage::disk('public')->delete('profiles/' . $profile->image);
        $profile->forceDelete();
        return redirect(route('pages.profile.index'))->with('success', 'delete success!');
    }



}
