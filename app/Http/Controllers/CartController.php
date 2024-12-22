<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\Order;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = Redis::get('cart') ? json_decode(Redis::get('cart'), true) : [];
        $cart[] = [
            'id' => count($cart) + 1, // Auto-generate an ID
            'name' => $request->name
        ];
        Redis::set('cart', json_encode($cart));

        return redirect('cart')->with('message', 'Item added to cart');
    }

    public function removeFromCart($id)
    {
        $cart = Redis::get('cart') ? json_decode(Redis::get('cart'), true) : [];
        $cart = array_filter($cart, function ($item) use ($id) {
            return isset($item['id']) && $item['id'] !== (int)$id;
        });
        Redis::set('cart', json_encode(array_values($cart))); // Reindex the array

        return redirect('cart')->with('message', 'Item removed from cart');
    }

    public function viewCart()
    {
        $cart = Redis::get('cart') ? json_decode(Redis::get('cart'), true) : [];
        return view('cart', ['cart' => $cart]);
    }

    public function placeOrderFromCart()
    {
        $cart = Redis::get('cart') ? json_decode(Redis::get('cart'), true) : [];
        if (empty($cart)) {
            return redirect('cart')->with('message', 'Cart is empty. Cannot place order.');
        }

        $order = new Order();
        $order->user_id = 1; // Placeholder for user ID; replace with actual user ID in real app
        $order->items = json_encode($cart);
        $order->save();

        Redis::del('cart'); // Clear the cart after placing the order

        return redirect('orders')->with('message', 'Order placed successfully');
    }

    
}
