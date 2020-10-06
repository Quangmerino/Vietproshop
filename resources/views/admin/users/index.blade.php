@extends('admin.layouts.app')

@section('title')
	User
@endsection

@section('content')
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">List User</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">List User</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								{{-- @can('Create-User') --}}
								<a href="{{route('admin.users.create')}}" class="btn btn-primary">Create User</a>
								{{-- @endcan --}}
								{{-- @can('Create-Role') --}}
								<a href="{{route('admin.roles.create')}}" class="btn btn-primary">Create Role</a>
								{{-- @endcan --}}
								<a href="{{route('admin.permissions.create')}}" class="btn btn-primary">Create Permission</a>
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Name</th>
											<th>Email</th>
                                            <th>User Role</th>
											<th width='25%'>Operations</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($users as $user)
										<tr>
											<td>{{$user->id}}</td>
											<td>{{$user->name}}</td>
											<td>{{$user->email}}</td>
											<td>   
											@if(!empty($user->getRoleNames()))
                                                   @foreach($user->getRoleNames() as $role)
                                                      <label class="btn btn-success">{{ $role }}</label>
                                                   @endforeach
                                               @endif
											<td>
												@can('Edit-User')
												    <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
												@endcan

												@can('Delete-User')
												    <a href="{{route('admin.users.delete',$user->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
												@endcan
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div align='right'>
									{{$users->links()}}
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->


			</div>
@endsection

