@extends('admin.layouts.app')

@section('title')
	Category
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Danh mục</li>
		</ol>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý danh mục</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<form action="{{route('admin.categories.store')}}" method="POST">
							@csrf
							<div class="col-md-5">
								<div class="form-group">
									<label for="">Danh mục cha:</label>
									<select class="form-control" name="parent" id="">
										<option>----ROOT----</option>
										{!! getCategory($categories,0,'',0) !!}
									</select>
								</div>
								<div class="form-group">
									<label for="">Tên Danh mục</label>
									<input type="text" class="form-control" name="name" id="" placeholder="Tên danh mục mới" value="">
									{!!ShowErrors($errors,'name')!!}
									<div>
										@if(session('error'))
											<div class="btn btn-danger">
												{{session('error')}}
											</div>
										@endif	
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Thêm danh mục</button>
							</div>
						</form>
						<div class="col-md-7">
							@if(session('success'))
							<div class="btn btn-success">
								{{session('success')}}
							</div>
							@endif
							<h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
							<div class="vertical-menu">
								<div class="item-menu active">Danh mục </div>
								<div>
								</div>
								{!!listCategory($categories,0,"")!!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection