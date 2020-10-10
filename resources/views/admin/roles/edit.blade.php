@extends('admin.layouts.app')

@section('title')
    Edit Role
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Role</h1>
        </div>
    </div>
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-user"></i> Edit Role </div>
                <form action="{{route('admin.roles.update',$role->id)}}" method="POST">
                    @csrf
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
    
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$role->name}}">
                                </div>                         
                            </div>
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                                <label for="permission">Permission</label>
                                <select class="form-control" name="permission" id="permission" multiple>
                                    @foreach ($permission as $item)
                                       <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                    <button class="btn btn-success"  type="submit">Edit Role</button>
                                    <a href="#" class="btn btn-danger" type="reset">Quit</a>
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