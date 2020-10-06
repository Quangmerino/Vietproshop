<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function store(CategoryRequest $request){

        if(getLevel(Category::all()->toArray(),$request->parent,1)  >2) {
            return redirect()->back()->with('error','Giao diện không được hỗ trợ menu 3 cấp');
        }

        $category = new Category();

        $category->name = $request->name;
        $category->slug = Str::slug($request->name,'-');
        $category->parent = $request->parent;

        $category->save();
        
        return redirect('/admin/categories')->with('success','Đã thêm danh mục'.$request->name);
    }

    public function edit($id){

        $categories = Category::all();
        $category = Category::find($id);
        return view('admin.categories.edit',compact('categories','category'));
    }

    public function update(CategoryRequest $request, $id){
        $categories = Category::find($id);

        $categories->name = $request->name;
        $categories->slug = Str::slug($request->name);
        $categories->parent = $request->parent;

        $categories->save();
        

        return redirect('/admin/categories')->with('success','Đã sửa danh mục thành công');
    }

    public function delete($id){

        $category = Category::find($id);
        $categories = Category::all();
        foreach($categories as $key => $value){
            if($value['parent'] == $id){
                  $value->delete();
                  // $value['parent'] == 0; xoa thu muc cha nhung ko xoa thu muc con
            }
        }
        $category->delete();
        
        return redirect('/admin/categories');
    }
}
