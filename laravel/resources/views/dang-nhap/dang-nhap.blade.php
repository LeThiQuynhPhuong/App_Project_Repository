<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Upvex Responsive Admin Dashboard Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

     @yield('css')

     <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}"rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>
</head>
<body class="authentication-bg authentication-bg-pattern">
	<div class="account=pages mt-5 md-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6 col-xl-5">
					<div class="card">
						<div class="card-body p-4">
							<div class="text-center w-75 m-auto">
								<a href="index.html">
									<span><img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="26"></span>
								</a>
								<p class="text-muted mb-4 mt-3"> Enter your mail address and password to access admin panel.</p>
							</div>
							<h5 class="auth-title"> Đăng nhập</h5>
							<form action="{{ route('xu-ly-dang-nhap')}}" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}" />
								<div class="form-group mb-3">
									<label  for="ten_dang_nhap"> Tên đăng nhập</label>
									<input class="form-control" id="ten_dang_nhap" type="text" name="ten_dang_nhap" required="">
									
								</div>
								<div class="form-group mb-3">
									<label  for="mat_khau"> Mật khẩu</label>
									<input class="form-control" id="mat_khau" type="password" name="mat_khau" required="" id="mat_khau" name="mat_khau">
									
								</div>
								<div class="form-group mb-3"  >
									<div class="custom-control custom-checkbox checkbox-info">
										<input class="custom-control-input" id="checkbox-signin" type="checkbox">
										<label class="custom-control-label" for="checkbox-signin">Remember Me</label>
									</div>
								</div>
								<div class="form-group mb-0 text-center">
									<button class="btn btn-danger btn-block" type="submit">Log In</button>
								</div>
							</form>
							<div class="text-center">
								<h5 class="mt-3 text-muted" >Sign In with</h5>
								<ul class="social-list list-inline mt-3 mb-0">
									<li class="list-inline-item">
										<a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="javascript: void(0);" class="social-list-item border-second text-second"><i class="mdi mdi-github-cicrle"></i></a>
									</li>
								</ul>
								
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-12 text-center">
							<p><a href="pages-recoverpw.html" class="text-muted ml-1">Forgot your password</a></p>
							<p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-muted ml-1"><b class="font-weight-semibold">Sign Up</b></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<footer class="footer footer-alt">
	2019 &copy; Upvex theme by <a href="" class="text-muted">Coderthemes</a>
</footer>
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>
</body>
</html>