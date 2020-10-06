<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;


class OrderController extends Controller
{
    public function order(){
        $orders = Order::where('state',2)->orderby('id','desc')->paginate(3);
        return view('admin.orders.order',compact('orders'));
    }

    public function detail($id){
        $orders = Order::find($id);
        return view('admin.orders.detail',compact('orders'));
    }

    public function approve($id){
        $order = Order::find($id);
        $order->state = 1;
        $order->save();

        return redirect('/admin/orders/process');
    }

    public function process(){
        $orders = Order::where('state',1)->paginate(3);
        return view('admin.orders.processed',compact('orders'));
    }
}
