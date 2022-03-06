<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>School Library</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <meta http-equiv="refresh" content="180" > --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('admin/css/bootstrap.css')}}">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="{{asset('admin/css/jquery-ui.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css') }}" />

<!-- Data Tables CSS -->
<link rel="stylesheet" type="text/css" href="{{ url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" type="text/css" href="{{ url('https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css') }}">
<!-- font CSS -->
<link href='{{ url('//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic') }}' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('admin/css/font.css')}}" type="text/css"/>
<link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{asset('admin/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('admin/js/modernizr.js')}}"></script>
<script src="{{asset('admin/js/jquery.cookie.js')}}"></script>
<script src="{{asset('admin/js/screenfull.js')}}"></script>
{{-- <script-src="{{ url('jquery.disablescroll.js') }}"></script> --}}

<script src="{{ url('http://code.jquery.com/ui/1.12.1/jquery-ui.js') }}" ></script>
<script src="{{ url('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js') }}"></script>


<!-- Data Tables JS -->
<script src="{{ url('https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js') }}"></script>

  		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
<!-- tables -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/css/table-style.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/css/basictable.css')}}" />
<script type="text/javascript" src="{{asset('admin/js/jquery.basictable.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<!-- //tables -->

<!-- charts -->
<script src="{{asset('admin/js/raphael-min.js')}}"></script>
<script src="{{asset('admin/js/morris.js')}}"></script>
<link rel="stylesheet" href="{{asset('admin/css/morris.css')}}">
<!-- //charts -->
<!--skycons-icons-->
<script src="{{asset('admin/js/skycons.js')}}"></script>
<!--//skycons-icons-->

<style>
	body {
        /* background: background-color: #4c4177; */
		/* background-image: linear-gradient(315deg, #4c4177 0%, #2a5470 74%); */
		/* background-color: #eec0c6;
background-image: linear-gradient(315deg, #eec0c6 0%, #7ee8fa 74%);

        background-size: cover;
		z-index: 10; */
    }
</style>

</head>
<body class="dashboard-page">
	<script>
	        var theme = $.cookie('protonTheme') || 'default';
	        $('body').removeClass (function (index, css) {
	            return (css.match (/\btheme-\S+/g) || []).join(' ');
	        });
	        if (theme !== 'default') $('body').addClass(theme);
        </script>
	<!--navbar-->
	@include('layout.includes._navbar')
	<!--end navbar-->
	<section class="wrapper scrollable">
		<nav class="user-menu">
			<a href="javascript:;" class="main-menu-access">
			<i class="icon-proton-logo"></i>
			<i class="icon-reorder"></i>
			</a>
		</nav>
		<!--titlebar-->
		@include('layout.includes._titlebar')
		<!--end titlebar-->

		<!--content-->
		@yield('content')
		<!--end content-->
		<!-- footer -->
		<div class="footer">
			<p>© 2022 Hardy Prabowo</p>
			<p>Version 1.0</p>
		</div>
		<!-- //footer -->
	</section>
	<script src="{{asset('admin/js/bootstrap.js')}}"></script>
	<script src="{{asset('admin/js/proton.js')}}"></script>
</body>
</html>
