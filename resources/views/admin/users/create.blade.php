@extends('admin.layouts.app')
@section('title')
    Create User
@endsection
@section('content')  
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Create User </h1>
        </div>
    </div>
    <a href="{{route('admin.users.index')}}" class="btn btn-primary">List User</a>
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-user"></i> Create User </div>
                <form action="{{route('admin.users.store')}}" method="POST">
                    @csrf
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">   
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">                            
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="{{old('email')}}">
                                    {!!ShowErrors($errors,'email')!!}
                                </div>
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="password" name="password" class="form-control" value="{{old('password')}}">
                                    {!!ShowErrors($errors,'password')!!}
                                </div>
                                <div class="form-group">
                                    <label>Full name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                    {!!ShowErrors($errors,'name')!!}
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" value="{{old('address')}}">
                                    {!!ShowErrors($errors,'address')!!}
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                                    {!!ShowErrors($errors,'phone')!!}
                                </div>
                                <div class="form-group">
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
                                        <button class="btn btn-success"  type="submit">Create User</button>
                                    <a href="{{route('admin.users.index')}}" class="btn btn-danger" type="reset">Quit</a>
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