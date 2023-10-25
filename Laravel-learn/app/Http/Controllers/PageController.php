<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\payment_method;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\Profile;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    //
    public function home(Request $request)
    {
        $products = Product::when($request->search, function($query, $search){
            return $query->where('title','like', "%{$search}%");
        })->get();;
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
        return view('pages.cart.index')->with([
            'carts' => $cart,
            'product'=>$product
        ]);
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





    // ================ ផ្នែក​ Order Controller =======================
    public function indexOrder()
    {
        $user = Auth::user();
        $order = Order::where('author_id', $user->id)->get();
        $productOrder = ProductOrder::whereIn('order_id', $order->pluck('id'))->get();
        return view('pages.order.index')->with([
            'orders' => $order,
            'productOrders'=> $productOrder,
            ]);
    }






    // ផ្នែក​ Checkout Controller
    public function indexCheckout()
    {
        if(Cart::count() == 0 ){
            return redirect()->route('pages.cart.index');
        }

        $product = Product::pluck('image','price','title', 'id')->toArray();
        $cart = Auth::user()->cart;
        return view('pages.cart.index')->with([
            'carts' => $cart,
            'product'=>$product,
        ]);
    }


    public function storeCheckout(Request $request)
    {
        $order = new Order();
        $order->order_status_id = 1;
        // $order->payment_method_id = 1;
        $order->payment_method_id = $request->input('payment_method_id');
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
        return redirect()->route('pages.order.index');
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
        $user = Auth::user();
        return view('pages.profile.index')->with(['users' => $user]);
    }

    public function store(Request $request)
    {
        return redirect(route('pages.profile.index'))->with('success', 'create success!');
    }

    public function update(user $user, Request $request)
    {
        if (Hash::check($request->input('old_password'), $user->password)) {

            $user->name = $request->input('name');
            $user->role = $request->input('role');
            $user->email = $request->input('email');
            $uploadImage = $request->file('selectedImage');
                if (!empty($uploadImage)) {
                   Storage::delete('public/users/' . $user->image);
                    $filename = time() . '_' . $uploadImage->getClientOriginalName();
                    $uploadImage->storeAs('public/users', $filename);
                    $user->image = $filename;
                }
            $user->password = bcrypt($request->input('new_password'));
            $user->save();

            return redirect(route('pages.profile.index'))->with('success', 'User updated successfully');
        } else {
            return back()->withErrors([
                'old_password' => 'The provided old password is incorrect',
            ]);
        }
    }

    public function forceDestroy(Profile $profile, Request $request)
    {
        Storage::disk('public')->delete('profiles/' . $profile->image);
        $profile->forceDelete();
        return redirect(route('pages.profile.index'))->with('success', 'delete success!');
    }



}
