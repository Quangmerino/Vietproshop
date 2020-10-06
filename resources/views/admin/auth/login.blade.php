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
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
				<form role="form" action="{{route('postlogin')}}" method="POST">
						@csrf
						<fieldset>
							<div>
								@if(session('thong-bao'))
									<div class="btn btn-danger">
										{{session('thong-bao')}}
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
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button class="btn btn-primary" type="submit" >Login</button>
						</fieldset>
					</form>
				</div>
				<a href="{{route('register')}}">You don't have account</a>
			</div>
		</div>
	</div>
</body>

</html>