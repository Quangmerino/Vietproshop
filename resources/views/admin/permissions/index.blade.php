@extends('admin.layouts.app')

@section('title')
	List Permission
@endsection

@section('content')
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">List Permission</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">List Permission</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{route('admin.permissions.create')}}" class="btn btn-primary">Create Permission</a>
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Name</th>
											<th width='25%'>Operations</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($permissions as $permission)
										<tr>
											<td>{{$permission->id}}</td>
											<td>{{$permission->name}}</td>
											<td>
												<a href="{{route('admin.permissions.edit',$permission->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
												<a href="{{route('admin.permissions.delete',$permission->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div align='right'>
									{{$permissions->links()}}
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->


			</div>
@endsection