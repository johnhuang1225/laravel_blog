<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Chenbro EIP</title>
	<link rel="stylesheet" href="{{asset('/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Chenbro</h1>
		{{--<h2>歡迎使用EIP</h2>--}}
		<div class="form">
			@if(session('msg'))
				<p style="color:red">{{session('msg')}}</p>
			@endif
			<form action="" method="post">
				{{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="username" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{url('admin/code')}}"
						 onclick="this.src='{{url('admin/code')}}?' + Math.random()">
					</li>
					<li>
						<input type="submit" value="登入"/>
					</li>
				</ul>
			</form>
			<p>&copy; 2017 Powered by IT
		</div>
	</div>
</body>
</html>