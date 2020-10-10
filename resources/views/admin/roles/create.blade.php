@extends('admin.layouts.app')

@section('title')
    Create Role
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Role</h1>
        </div>
    </div>
    <a href="{{route('admin.roles.index')}}" class="btn btn-primary">List Roles</a>
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-user"></i> Create Role </div>
                   @if(session('success'))
                   <div class="btn btn-success">
                       {{session('success')}}
                   </div>
                   @endif
                <form action="{{route('admin.roles.store')}}" method="POST">
                    @csrf
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
    
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">   
                                <label for="permission">Permission</label>
                                <select class="form-control" name="permission" id="permission">
                                    @foreach ($roles as $role)
                                       <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>                     
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">   
                                    <label for="permission">Permission</label>
                                    <select class="form-control" name="permission" id="permission" multiple>
                                        @foreach ($permission as $item)
                                           <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                    <button class="btn btn-success"  type="submit">Create Role</button>
                                    <a href="{{route('admin.roles.index')}}" class="btn btn-danger" type="reset">Huỷ bỏ</a>
                                </div>
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
									{{-- <div class="row">
										<div class="col-12">
											<div class="col-6">
												{{$user->name}}
											</div>
											<div col-6>
												<select name="role" id="" class="form-control">
													@foreach($roles as $role)
												<option value="{{$role->id}}">{{$role->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<button class="btn btn-success"  type="submit">Add Role</button>
									</div> --}}