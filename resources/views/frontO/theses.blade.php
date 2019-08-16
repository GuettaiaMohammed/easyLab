@extends('layouts.course')
@section('title','LRI | Theses')

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('comodo/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('comodo/vendors/linericon/style.css')}}">
	<link rel="stylesheet" href="{{asset('comodo/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('comodo/vendors/owl-carousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('comodo/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('comodo/vendors/nice-select/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('comodo/vendors/animate-css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('comodo/vendors/flaticon/flaticon.css')}}">
	<!-- main css -->
	<link rel="stylesheet" href="{{asset('comodo/css/style.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('course/styles/membre_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/courses_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/courses_responsive.css')}}">

@section('content')

<!-- head -->

    <div class="home" style="height:400px">
        <div class="home_background_container prlx_parent">
            <div class="home_background prlx" style="background-image:url({{url('course/images/AdobeStock_238552729_Preview.jpeg')}})"></div>
        </div>
        <div class="home_content">
            <h1>Théses</h1>
        </div>
    </div>

    <!--================Start About Us Area =================-->
    @foreach($theses as $these)
	<section class="about_us_area section_gap_top">
		<div class="container">
			<div class="row about_content align-items-center">
				<div class="col-lg-6">
					<div class="section_content">
						<h6><b>Presenté par :</b> {{$these->user->name}} {{$these->user->prenom}}</h6>
						
						<h1>{{$these->titre}}</h1>
						<p>{{$these->sujet}}</p>
						
					
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about_us_image_box justify-content-center">
						<img class="img-fluid w-100" src="{{asset($these->user->photo)}}" style="height:400px;width:200px" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
		@endforeach





@endsection

<!--================End Footer Area =================-->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{asset('comodo/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('comodo/js/popper.js')}}"></script>
	<script src="{{asset('comodo/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('comodo/js/stellar.js')}}"></script>
	<script src="{{asset('comodo/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('comodo/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{asset('comodo/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
	<script src="{{asset('comodo/vendors/isotope/isotope-min.js')}}"></script>
	<script src="{{asset('comodo/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
	<script src="{{asset('comodo/js/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{asset('comodo/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('comodo/vendors/counter-up/jquery.counterup.min.js')}}"></script>
	<script src="{{asset('comodo/js/mail-script.js')}}"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="{{asset('comodo/js/gmaps.min.js')}}"></script>
	<script src="{{asset('comodo/js/theme.js')}}"></script>