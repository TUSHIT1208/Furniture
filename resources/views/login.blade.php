<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<style>
		body {
			margin: 0;
			color: #989cb4;
			background: #c8c8c8;
			font: 600 16px/18px 'Open Sans', sans-serif;
		}
		*, :after, :before {
			box-sizing: border-box;
		}
		.clearfix:after, .clearfix:before {
			content: '';
			display: table;
		}
		.clearfix:after {
			clear: both;
			display: block;
		}
		a {
			color: inherit;
			text-decoration: none;
		}
		.login-wrap {
			width: 100%;
			margin: auto;
			max-width: 525px;
			min-height: 670px;
			position: relative;
			background: url('https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg') no-repeat center;
			box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
		}
		.login-html {
			width: 100%;
			height: 100%;
			position: absolute;
			padding: 90px 70px 50px 70px;
			background: rgba(59, 93, 80, 0.9);
		}
		.login-html .tab {
			font-size: 22px;
			margin-right: 15px;
			padding-bottom: 5px;
			display: inline-block;
			border-bottom: 2px solid transparent;
			cursor: pointer;
		}
		.login-html .tab:hover {
			color: #fff;
		}
		.login-html .form {
			display: none;
		}
		.login-html .form.active {
			display: block;
		}
		.group {
			margin-bottom: 15px;
		}
		.group .label, .group .input, .group .button {
			width: 100%;
			color: #fff;
			display: block;
		}
		.group .input, .group .button {
			border: none;
			padding: 15px 20px;
			border-radius: 25px;
			background: rgba(255, 255, 255, .1);
		}
		.group .button {
			background: #3b5d50db;
			border: 1px solid white;
			cursor: pointer;
		}
		.group .button:hover {
			background: white;
			color: #3b5d50db;
		}
		.hr {
			height: 2px;
			margin: 60px 0 50px 0;
			background: rgba(255, 255, 255, .2);
		}
		.foot-lnk {
			text-align: center;
		}

		/* Base styles for the icon */
.icon-rounded {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 50px;
    height: 50px;
    background-color: #4caf50; /* Green color */
    color: white;
    border-radius: 50%; /* Makes it circular */
    text-decoration: none;
    font-size: 24px;
	left: 5%;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Add a subtle hover animation */
.icon-rounded:hover {
    transform: scale(1.1); /* Slightly enlarges the icon */
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Adds a shadow effect */
}

/* Add a bouncing animation */
@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

/* Animation applied to the icon */
.icon-rounded.animate {
    animation: bounce 1s infinite; /* Infinite bouncing effect */
}

	.rotate {
				display: inline-block;
				animation: rotate 2s linear infinite; /* Adjust duration and timing as needed */
			}

			@keyframes rotate {
				from {
					transform: rotate(0deg);
				}
				to {
					transform: rotate(360deg);
				}
			}

			.icon-circle {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 50px;
    height: 50px;
    background-color: #59915b; /* Green background */
    border-radius: 50%; /* Circular shape */
    color: white;
    font-size: 30px;
    transition: transform 0.5s ease; /* Smooth transition for rotating */
    animation: rotateY 5s infinite linear; /* Infinite Y-axis rotation */
}

/* Keyframes for rotating along the Y-axis */
@keyframes rotateY {
    0% {
        transform: rotateY(0deg);
    }
    100% {
        transform: rotateY(360deg);
    }
}

	</style>
</head>
<body>
	<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
		<div class="container">
			<a class="navbar-brand" href="/">Furni<span>.</span></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item">
						<a class="nav-link" href="/">Home</a>
					</li>
					<li><a class="nav-link" href="/shop">Shop</a></li>
					<li><a class="nav-link" href="/about">About us</a></li>
					<li><a class="nav-link" href="/blog">Blog</a></li>
				</ul>
				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
					<li><a class="nav-link" href="/login"><img src="{{ asset('images/user.svg') }}"></a></li>
					<li><a class="nav-link" href="{{ route('addcart.index') }}"><img src="{{ asset('images/cart.svg') }}"></a></li>
					<li><a style="color: white; font-size: 150%; position: relative; left: 130%; top: 23%;" href="{{ route('addwishlist.index') }}"><i class="far fa-heart"></i></a></li>
				</ul>
			</div>
		</div>	
	</nav>
	<div class="login-wrap mt-5">
		<div class="login-html">
			@if (@session('success'))
				<h5 style="position: relative; left: 18%; bottom: 9%;">{{ @session('success') }}<a href="#" class="icon-rounded">
					<i class="fas fa-check rotate"></i>
				</a></h5>
			@endif
			@if (@session('error'))
				<h5 style="position: relative; left: 18%; bottom: 9%;">
					{{ @session('error') }} <div class="icon-circle"> <i class="fas fa-times"></i> </div>
				</h5>
			@endif
			@if (@session('logout'))
				<h5 style="position: relative; left: 18%; bottom: 9%;">
					{{ @session('logout') }} <div class="icon-circle"><a href="#" class="icon-rounded">
						<i class="fas fa-check"></i>
					</a></div>
				</h5>
			@endif
			@if (@session('cartError'))
				<h5 style="position: relative; left: 10%; bottom: 9%; font-family: auto;">
					{{ @session('cartError') }}
				</h5>
			@endif
			@if (@session('errorWishlist'))
				<h5 style="position: relative; left: 10%; bottom: 9%; font-family: auto;">
					{{ @session('errorWishlist') }}
				</h5>
			@endif
			<div class="tabs" style="text-align: center;">
				<span class="tab" onclick="toggleForm('signin')">Sign In</span>
				<span class="tab" onclick="toggleForm('signup')">Sign Up</span>
			</div>
			<form id="signin-form" class="form active mt-5" method="POST" action="/check" style="position: relative; top : 10%;">
				@csrf
				<div class="group">
					<label for="signin-user" class="label">Username</label>
					<input id="signin-user" name="username" type="text" class="input">
					<span>
						@error('username')
							<p class="text text-info">{{ $message }}*</p>
						@enderror
					</span>
				</div>
				<div class="group">
					<label for="signin-pass" class="label">Password</label>
					<input id="signin-pass" name="password" type="password" class="input" data-type="password">
					<span>
						@error('password')
							<p class="text text-info">{{ $message }}*</p>
						@enderror
					</span>
				</div>
				<div class="group">
					<input id="signin-check" type="checkbox" class="check">
					<label for="signin-check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
			</form>
			<form id="signup-form" class="form mt-5" method="POST" action="{{ route('client.store') }}">
				@csrf
				<div class="group">
					<label for="signup-user" class="label">Username</label>
					<input id="signup-user" name="username" type="text" class="input" value="{{ old('username') }}">
					<span style="color: rgb(37 150 172) !important;">
						@error('username')
							{{ $message }}
						@enderror
					</span>
				</div>
				<div class="group">
					<label for="signup-pass" class="label">Password</label>
					<input id="signup-pass" name="password" type="password" class="input" value="{{ old('password') }}">
					<span style="color: rgb(37 150 172) !important;">
						@error('password')
							{{ $message }}
						@enderror
					</span>
				</div>
				<div class="group">
					<label for="signup-phone" class="label">Phone</label>
					<input id="signup-phone" name="phone" type="number" class="input" value="{{ old('phone') }}">
					<span style="color: rgb(37 150 172) !important;">
						@error('phone')
							{{ $message }}
						@enderror
					</span>
				</div>
				<div class="group">
					<label for="signup-email" class="label">Email Address</label>
					<input id="signup-email" name="email" type="email" class="input" value="{{ old('email') }}">
					<span style="color: rgb(37 150 172) !important;">
						@error('email')
							{{ $message }}
						@enderror
					</span>
				</div>
				<div class="group">
					<label for="signup-address" class="label">House Address</label>
					<input class="input" name="house" value="{{ old('house') }}"/>
					<span style="color: rgb(37 150 172) !important;">
						@error('house')
							{{ $message }}
						@enderror
					</span>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
			</form>
		</div>
	</div>
	<script>
		function toggleForm(formId) {
			document.querySelectorAll('.form').forEach(form => form.classList.remove('active'));
			document.getElementById(formId + '-form').classList.add('active');
		}
	</script>
</body>
</html>