@extends('layouts.course')
@section('title','LRI | Liste des projets')
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('edusmart/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('edusmart/vendors/linericon/style.css')}}">
    <link rel="stylesheet" href="{{asset('edusmart/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('edusmart/vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('edusmart/vendors/lightbox/simpleLightbox.css')}}">
    <link rel="stylesheet" href="{{asset('edusmart/vendors/nice-select/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('edusmart/vendors/animate-css/animate.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('edusmart/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('course/styles/courses_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('course/styles/courses_responsive.css')}}">
@section('content')

<!-- Home -->

	<div class="home" style="height:450px">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url({{url('course/images/4_0.jpg')}})"></div>
		</div>
		<div class="home_content">
			<h1>Projets</h1>
		</div>
	</div>

	<!-- Popular -->

	<div class="popular page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center" style="padding-buttom:-50px">
						<h1>Nos projets</h1>
					</div>
				</div>
			</div>
			<section class="course_details_area section_gap" style="margin-top:-100px">
                <div class="col-lg-12 course_details_left"> 
                    <div class="content_wrapper">
                        <h2 class="title" style="color:black">Liste des projets</h4>
                        <div class="content">
                            <ul class="course_list">
                                <li class="justify-content-between d-flex">
                                    <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                  <th style="color:black">Intitulé</th>
                                                  <th style="color:black">Type</th>
                                                  <th style="color:black">Chef</th>
                                                  <th style="color:black"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($projets as $projet)
                                                  <tr>
                                                    <td style="color:#2F4F4F">{{$projet->intitule}} </td>
                                                    <td style="color:#2F4F4F">{{$projet->type}}</td>
                                                    <td style="color:#2F4F4F">{{$projet->chef->name}} {{$projet->chef->prenom}}</td>
                                                    <td> <a class="primary-btn text-uppercase" href=" {{url('projects/'.$projet->id.'/detailsF')}} ">Voir Details</a></td>
                                                    
                                                  </tr>
                                                @endforeach
                                                 </tbody>
                                    </table>
                                   
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
			</section>

		</div>
	</div>

@endsection

		<script src="{{asset('edusmart/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('edusmart/js/popper.js')}}"></script>
        <script src="{{asset('edusmart/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('edusmart/js/stellar.js')}}"></script>
        <script src="{{asset('edusmart/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('edusmart/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('edusmart/js/owl-carousel-thumb.min.js')}}"></script>
        <script src="{{asset('edusmart/js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{asset('edusmart/vendors/counter-up/jquery.counterup.js')}}"></script>
        <script src="{{asset('edusmart/js/mail-script.js')}}"></script>
        <!--gmaps Js-->
        <script src="{{url('https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE')}}"></script>
        <script src="{{asset('edusmart/js/gmaps.min.js')}}"></script>
        <script src="{{asset('edusmart/js/theme.js')}}"></script>