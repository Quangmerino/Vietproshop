<?php

namespace App\Http\Controllers\Client\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $new = Product::orderBy('id','desc')->take(8)->get();
        $featured = Product::where('featured',1)->orderBy('id','desc')->take(4)->get();
        $data['new'] = $new;
        $data['featured'] = $featured;
        return view('client.home.index',$data);
    }

    public function about(){
        return view('client.home.about');
    }

    public function contact(){
        return view('client.home.contact');
    }

    // public function slugcategory($slugcategory){

    //     $data['product'] = Category::where('slug',$slugcategory)->paginate(6);
    //     $data['categories'] = Category::all();
        
    //     return view('client.products.shop',$data);
    // } 

}
