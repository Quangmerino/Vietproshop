@extends('admin.layouts.app')

@section('title')
	List Role
@endsection

@section('content')
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">List Role</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">List Role</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@can('Create-Role')
								<a href="{{route('admin.permissions.create')}}" class="btn btn-primary">Create Role</a>
								@endcan						
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Name</th>
											<th width='25%'>Operations</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($roles as $role)
										<tr>
											<td>{{$role->id}}</td>
											<td>{{$role->name}}</td>
											<td>
												@can('Edit-Role')
												<a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
												@endcan	
												@can('Delete-Role')
												<a href="{{route('admin.roles.delete',$role->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
												@endcan	
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div align='right'>
									{{$roles->links()}}
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
@endsection