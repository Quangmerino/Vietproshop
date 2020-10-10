<?php

namespace App\Http\Controllers\Client\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function shop(){
        $data['product'] = Product::paginate(6);
        $data['categories'] = Category::all();
        return view('client.products.shop',$data);
    }

    public function filter(Request $request){
        $data['product'] = Product::whereBetween('price',[$request->start,$request->end])->paginate(6);
        $data['product']->appends(['start' => $request->start,'end' => $request->end]);

        $data['categories'] = Category::all();

        return view('client.products.shop',$data);
    }

    public function detail($slugproduct)
    { 
        $data['news'] = Product::orderBy('id','desc')->take(4)->get();
        $data['products'] = Product::where('slug',$slugproduct)->first();
        return view('client.products.detail',$data);
    }

}
