<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\order_status;
use App\Models\ProductOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $order_id = $request->order_id;
        $orderStatus = order_status::pluck('title', 'id')->toArray();
        $orders = Order::when($order_id, function ($query, $order_id) {
            return $query->where('id', $order_id);
        })
        ->get();

        $productOrders = ProductOrder::when($order_id, function ($query , $order_id) {
            return $query->where('order_id', $order_id);
        })
        ->get();

        return view('admin.orders.index', with([
            'productOrders' => $productOrders,
            'orders' => $orders,
            'orderStatus' => $orderStatus]));
    }


    public function update(Order $order, Request $request)
    {
        $request->validate([
            'order_status_id' => 'required',
        ]);
        $input = $request->all();
        $order->order_status_id = $input['order_status_id'];
        $order->save();
        return redirect(route('admin.orders.index'));
    }



}
