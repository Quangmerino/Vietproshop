<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    // function __construct()
    // {
    //      $this->middleware('permission:Product-Create', ['only' => ['create','store']]);
    //      $this->middleware('permission:Product-Edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:Product-Delete', ['only' => ['delete']]);
    // }

    public function index(){
        $products = Product::paginate(4);
        return view('admin.products.index', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }

    public function store(ProductRequest $request){

        $product = new Product();
        
        $product->category_id = $request->category;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->featured = $request->featured;
        $product->state = $request->state;
        $product->info = $request->info;
        $product->description = $request->description;

        if($request->hasFile('image')){
            $file = $request->image;
            $file_name = Str::slug($product->name,'_').'.'.$file->getClientOriginalExtension();
            //upload image on serve
            $path = public_path().'/uploads';
            $file->move($path,$file_name);

            $product->image = $file_name;

        }else{
            $product->image = 'no-img.jpg';
        }
        $product->save();
        return redirect('/admin/products')->with('success','Đã thêm sản phẩm thành công');
    }

    public function edit($id){
        $categories = Category::all();
        $category = Category::find($id);
        $product = Product::find($id);
        return view('admin.products.edit', compact('product','categories','category'));
    }

    public function update(EditProductRequest $request,$id){

        $product = Product::find($id);

        $product->category_id = $request->category;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name,'-');
        $product->price = $request->price;
        $product->featured = $request->featured;
        $product->state = $request->state;
        $product->info = $request->info;
        $product->description = $request->description;


        if($request->hasFile('image')){
           
            $file = $request->image;
            $file_name = Str::slug($product->name,'_').'.'.$file->getClientOriginalExtension();
            //upload image on serve
            $path = public_path().'/uploads';
            $file->move($path,$file_name);

            //delete image
            $old_path = public_path().'/uploads'.'/'.$product->image;
            unlink($old_path);
            
            $product->image = $file_name;

        }else{
            $product->image = 'no-img.jpg';
        }

        $product->save();
        return redirect('/admin/products')->with('success','Đã sửa sản phẩm thành công');
    }

    public function delete($id){
        
        $product = Product::find($id);

        $product->delete();
        return redirect('/admin/products');
    }
}
