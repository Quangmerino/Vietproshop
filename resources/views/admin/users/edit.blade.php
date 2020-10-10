@extends('admin.layouts.app')

@section('title')
    Edit User
@endsection

@section('content')
    
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa Thành viên</h1>
        </div>
    </div>
<div class="row">
    <form action="{{route('admin.users.update',$user->id)}}" method="POST">
        @csrf
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-user"></i> Sửa thành viên - </div>
                <div class="panel-body">
                    <div class="row justify-content-center" style="margin-bottom:40px">

                        <div class="col-md-8 col-lg-8 col-lg-offset-2">
                         
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{$user->email}}">
                                {!!ShowErrors($errors,'email')!!}
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input type="password" name="password" class="form-control" value="{{$user->password}}">
                                {!!ShowErrors($errors,'password')!!}
                            </div>
                            <div class="form-group">
                                <label>Full name</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                {!!ShowErrors($errors,'name')!!}
                            </div>
                                <label for="permission">Role</label>
                                <select class="form-control" name="roles" id="permission" value="">
                                    @foreach ($roles as $role)
                                       <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">   
                                  <button class="btn btn-success"  type="submit">Edit User</button>
                                <a href="{{route('admin.users.index')}}" class="btn btn-danger" type="reset">Quit</a>
                            </div>
                        </div>
                    </div>               
                    <div class="clearfix"></div>
                </div>
            </div>
    </div>
    </form>
</div>
</div>
@endsection
