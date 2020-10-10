@extends('admin.layouts.app')

@section('title')
    Create Product
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Product</h1>
        </div>
        
    </div>
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Create Product</div>
                <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">          
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="category" class="form-control" value="{{old('category')}}">
                                                {!! getCategory($categories,0,'',0) !!}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input type="text" name="code" class="form-control" value="{{old('code')}}">
                                            {!!ShowErrors($errors,'code')!!}
                                        </div>
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                            {!!ShowErrors($errors,'name')!!}
                                        </div>
                                        <div class="form-group">
                                            <label>Giá sản phẩm (Giá chung)</label>
                                            <input type="number" name="price" class="form-control" value="{{old('price')}}">
                                            {!!ShowErrors($errors,'price')!!}
                                        </div>
                                        <div class="form-group">
                                            <label>Sản phẩm có nổi bật</label>
                                            <select name="featured" class="form-control">
                                                <option value="0">Không</option>
                                                <option value="1">Có</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <select name="state" class="form-control">
                                                <option value="1">Còn hàng</option>
                                                <option value="0">Hết hàng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ảnh sản phẩm</label>
                                            <input id="img" type="file" name="image" class="form-control hidden"
                                                onchange="changeImage(this)">
                                                {!!ShowErrors($errors,'image')!!}
                                            <img id="avatar" class="thumbnail" width="100%" height="350px" src="img/import-img.png">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Thông tin</label>
                                            <textarea name="info"  style="width: 100%;height: 100px;" value="{{old('info')}}"></textarea>
                                            {!!ShowErrors($errors,'info')!!}
                                        </div>
                                     </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="editor" name="description" style="width: 100%;height: 100px;"  value="{{old('description')}}"></textarea>         
                                    </div>
                                    @can('Create-Product')
                                    <button class="btn btn-success" name="add-product" type="submit">Create Product</button>
                                    @endcan
                                    <a href="{{route('admin.products.index')}}" class="btn btn-danger" type="reset">Quit</a>
                                </div>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')  
@parent
<script>
    function changeImg(input){
           //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
           if(input.files && input.files[0]){
               var reader = new FileReader();
               //Sự kiện file đã được load vào website
               reader.onload = function(e){
                   //Thay đổi đường dẫn ảnh
                   $('#avatar').attr('src',e.target.result);
               }
               reader.readAsDataURL(input.files[0]);
           }
       }
       $(document).ready(function() {
           $('#avatar').click(function(){
               $('#img').click();
           });
       });

   </script>
@endsection