<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{$title}}</title>
<link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet" />
<link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{url('css/style.css')}}" rel="stylesheet"/>
<script src="{{url('js/jquery.min.js')}}"></script>
</head>

<body>
	<div>
		<nav class="navbar nav-justified bg-light">
			<form class="form-inline my-2 my-lg-0 row-cols-4">
				<a href="{{route('login')}}" class="btn btn-login">Login</a>
			</form>
		</nav>
	</div>

	<div class="col-md-12 brand">
		<div class="col-md-4 name">
			@if($logo)
				<img src="{{url('storage')}}/{{$logo}}" width="100%" alt="logo">
			@endif
		</div>
		<!--
		<div class="col-md-8">
			<img src="{{url('images/final-news-site_06.gif')}}" width="100%" />
		</div>
	-->
	</div>

	{{$slot}}

	<div class="col-md-12 bottom">
		<div class="col-md-4">
			<h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #f00;">Sobre Nós</span></h3>
			@if($logo)
				<img src="{{url('storage')}}/{{$logo}}" width="100%" alt="logo">
			@endif
			<p align="justify">{{$aboutUs}}</p>
		</div>
	</div>
</body>
<script src="{{url('js/bootstrap.min.js')}}"></script>