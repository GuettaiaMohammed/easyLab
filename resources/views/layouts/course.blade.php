<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('course/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('course/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/responsive.css')}}">

</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<img src="{{asset('course/images/easyLAB.jpg')}}" alt="" style="height:80px;width:130px">
					
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><a href="{{url('listactualite')}}">Acceuil</a></li>
						<li class="main_nav_item"><a href="{{url('apropos')}}">A propos</a></li>
						<li class="main_nav_item submenu dropdown">
							<a href="#"class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false">Membres</a>
							<ul class="dropdown-menu">
								<li class="main_nav_item" ><a href="{{url('membreTrombin')}}">Trombinoscope</a></li>
								<li class="main_nav_item"><a href="{{url('membreList')}}">Liste</a></li>
							</ul>
						</li>
						<li class="main_nav_item"><a href="{{url('listeEquipe')}}">Equipes</a></li>
						<li class="main_nav_item"><a href="{{url('projects')}}">Projets</a></li>
						<li class="main_nav_item"><a href="{{url('actualitesF')}}">Actualités</a></li>
						<!--<li class="main_nav_item"><a href="contact.html">Contact</a></li>-->
					</ul>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<img src="{{asset('course/images/user.svg')}}" alt="">
			<span> 	<a href="{{url('dashboard')}}" style="color:white;font-size:180%">Login </a></span>
		</div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>

	</header>
	
	<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="#">Acceuil</a></li>
					<li class="menu_item menu_mm"><a href="#">A propos</a></li>
					<li class="menu_item menu_mm"><a href="elements.html">Membres</a></li>
					<li class="menu_item menu_mm"><a href="courses.html">Equipes</a></li>
					<li class="menu_item menu_mm"><a href="news.html">Projets</a></li>
					<li class="menu_item menu_mm"><a href="news.html">Actualités</a></li>
					<li class="menu_item menu_mm"><a href="contact.html">Contactez-Nous</a></li>
				</ul>

				<!-- Menu Social -->
				
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
			</div>

		</div>

	</div>

	@yield('content')




<script src="{{asset('course/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('course/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('course/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('course/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('course/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('course/plugins/scrollcourse/magic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('course/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('course/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('course/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('course/plugins/scrollTo/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('course/plugins/easing/easing.js')}}"></script>
<script src="{{asset('course/js/custom.js')}}"></script>





</body>
</html>