<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
    <base href="{{asset('')}}vietpro-store-basic/Start/backend/">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<link href="css/styles.css" rel="stylesheet">
</head>

<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
				<form role="form" action="{{route('store')}}" method="POST">
						@csrf
						<fieldset>
							<div>
								@if(session('seccess'))
									<div class="btn btn-info">
										{{session('seccess')}}
									</div>
								@endif	
                            </div>
                            <div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" value="{{old('email')}}" type="text" autofocus="">
								{!!ShowErrors($errors,'email')!!}
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" value="{{old('password')}}" type="password">
								{!!ShowErrors($errors,'password')!!}
							</div>
                            <div class="form-group">
								<input class="form-control" placeholder="Name" name="name" value="{{old('name')}}" type="text" autofocus="">
								{!!ShowErrors($errors,'name')!!}
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Address" name="address" value="{{old('address')}}" type="text" autofocus="">
								{!!ShowErrors($errors,'address')!!}
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Phone" name="phone" value="{{old('phone')}}" type="phone">
								{!!ShowErrors($errors,'phone')!!}
							</div>
							<button class="btn btn-primary" type="submit" >Register</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>