<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản trị - @yield('title')</title>
    <!-- css -->
    <base href="{{asset('')}}vietpro-store-basic/Start/backend/">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<link href="css/styles.css" rel="stylesheet">
	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>
	<link rel="stylesheet" href="Awesome/css/all.css">
</head>
<body>
	<!-- header -->
@include('admin.layouts.nav')
	<!-- header -->
	<!-- sidebar left-->
@include('admin.layouts.sidebar')
	<!--/. end sidebar left-->

@yield('content')
	<!--/.main-->

	
	{{-- <script src="js/chart-data.js"></script> --}}
	
@section('scripts')
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
@show
	

</body>

</html>