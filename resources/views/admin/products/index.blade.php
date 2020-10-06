@extends('admin.layouts.app')

@section('title')
	Product
@endsection

@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">List Product</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">List Product</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					@if(session('success'))
							<div class="btn btn-success">
								{{session('success')}}
							</div>
							@endif
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{route('admin.products.create')}}" class="btn btn-primary">Create Product</a>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Thông tin sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th>Tình trạng</th>
											<th>Danh mục</th>
											<th width='18%'>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($products as $product)										
										<tr>
										    <td>{{$product->id}}</td>
											<td>
												<div class="row">
												<div class="col-md-3"><img src="/uploads/{{$product->image}}" alt="Áo đẹp" width="100px" class="thumbnail"></div>
													<div class="col-md-9">
														<p><strong>Mã sản phẩm : {{$product->code}} </strong></p>
														<p>Tên sản phẩm : {{$product->name}}</p>														
													</div>
												</div>
											</td>
											<td>{{ number_format($product->price,0,"",",") }}  VND</td>
											<td>
												@if($product->state ==1)
												   <a class="btn btn-success" href="#" role="button">Còn hàng</a>
												@else
												   <a class="btn btn-danger" href="#" role="button">Hết Hàng</a>
												@endif
											</td>
											<td>
												{{ $product->categories->name }}
											</td>
											<td>
												@can('Edit-Product')
												<a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Edit </a>
												@endcan
												@can('Delete-Product')
												<a href="{{route('admin.products.delete',$product->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete </a>
												@endcan
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div align='right'>
									{{ $products->links() }}
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
			</div>
@endsection