<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->items = json_encode($request->items);
        $order->save();

        return redirect('orders')->with('message', 'Order placed successfully');
    }

    public function viewOrders()
    {
        $orders = Order::all();
        return view('orders', ['orders' => $orders]);
    }
}