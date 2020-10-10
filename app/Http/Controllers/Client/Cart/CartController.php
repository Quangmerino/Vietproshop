<?php

namespace App\Http\Controllers\Client\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\User;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $data['carts'] = Cart::content();
        $data['total'] = Cart::total(0, '', '.');
        return view('client.carts.cart', $data);
    }

    public function addCart(Request $request)
    {
        $product = Product::find($request->id_product);
        if($request->has('quantity')){
           $qty = $request->quantity;
        }else{
           $qty = 1;
        }
        Cart::add([
            'id' => $product->code,
            'name' => $product->name,
            'qty' => $qty,
            'price' => $product->price,
            'weight' => 0,
            'options' => ['image' => $product->image]
        ]);

        return redirect('/carts');
    }

    public function updateCart($rowId, $qty)
    {
        Cart::update($rowId, $qty);
        return "success";
    }

    public function deleteCart($rowId)
    {
        Cart::remove($rowId);
        return redirect('/carts');
    }

    public function checkout()
    {
        $data['carts'] = Cart::content();
        $data['total'] = Cart::total(0, '', '.');
        return view('client.carts.checkout', $data);
    }

    public function store(Request $request){
        $order = new Order();

        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->state = 2;
        $order->total = Cart::total(0,'','.');

        $order->save();
        
        $carts = Cart::content();

        foreach($carts as $cart){
            $product_order = new ProductOrder();
            $product_order->code = $cart->code;
            $product_order->name = $cart->name;
            $product_order->price = $cart->price;
            $product_order->quantity = $cart->qty;
            $product_order->image = $cart->options->image;
            $product_order->order_id = $order->id;
            $product_order->save();
        }

        Cart::destroy();

        return redirect('client.carts.complete'+$order->id);
    }

    public function complete($id)
    {
        $data['orders'] = Order::find($id);

        return view('client.carts.complete',$data);
    }
}
