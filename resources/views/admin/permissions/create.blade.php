@extends('admin.layouts.app')

@section('title')
    Create Permission
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Permission</h1>
        </div>
    </div>
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <a href="{{route('admin.permissions.index')}}" class="btn btn-primary">List Permission</a>
                <div class="panel-heading"><i class="fas fa-user"></i> Create Permission </div>
                <form action="{{route('admin.permissions.store')}}" method="POST">
                    @csrf
                        @if(session('success'))
							<div class="btn btn-success">
								{{session('success')}}
							</div>
						@endif
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
    
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="">
                                </div>                         
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                    <button class="btn btn-success"  type="submit">Create Permission</button>
                                    <a href="{{route('admin.permissions.index')}}" class="btn btn-danger" type="reset">Quit</a>
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