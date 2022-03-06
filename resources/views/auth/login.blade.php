<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>School Library</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">

<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{ asset('admin/css/style.css') }}" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='{{ url('//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic') }}' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ asset('admin/css/font.css') }}" type="text/css"/>
<link href="{{ asset('admin/css/font-awesome.css') }}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<link rel="stylesheet" type="text/css" href="{{ url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}">
<script src="{{ url('http://code.jquery.com/ui/1.12.1/jquery-ui.js') }}" ></script>
<script src="{{ url('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js') }}"></script>

</head>
<body class="signup-body">
		<div class="agile-signup">	
			
			<div class="content2">
				<div class="grids-heading gallery-heading signup-heading">
                    <b><h3>School Library Management System</h3></b>
				</div>
                @if (session('statusLogin'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ session('statusLogin') }}</strong>
                    </div> 
				@elseif(session('statusLogout'))
					<div class="alert alert-success" role="alert">
						<strong>{{ session('statusLogout') }}</strong>
					</div>
				@elseif(session('statusSuccessReset'))
					<div class="alert alert-success" role="alert">
						<strong>{{ session('statusSuccessReset') }}</strong>
					</div>
                @endif
				<form action="{{ url('/postlogin') }}" method="post" enctype="multipart/form-data">
                    @csrf
					<input type="text" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
					<input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
					<input type="submit" class="register" value="Login">
				</form>
				<br>
				OR
				<br>
				<div>
					<a href="{{ url('/resetpass') }}" class="btn btn-info btn-sm">Reset Password</a>
				</div>
				<div class="copyright">
					<p>© 2022 Hardy Prabowo</p>
					<p>Version 1.0</p>
				</div>
			</div>
			
			<!-- footer -->
			
			<!-- //footer -->
			
		</div>
	<script src="{{ asset('admin/js/proton.js') }}"></script>
</body>
</html>
