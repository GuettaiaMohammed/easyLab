@extends('layouts.course')
@section('title','LRI | Liste des membres')
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
			<h1>Membres</h1>
		</div>
	</div>

	<!-- Popular -->

	<div class="popular page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center" style="padding-buttom:-50px">
						<h1>Nos membres</h1>
					</div>
				</div>
			</div>
			<section class="course_details_area section_gap">
                <div class="col-lg-12 course_details_left"> 
                    <div class="content_wrapper">
                        <h2 class="title" style="color:black">Liste des membres</h4>
                        <div class="content">
                            <ul class="course_list">
                                <li class="justify-content-between d-flex">
                                    <table class="table table-hover col-lg-12">
                                      <thead>
                                        <tr>
                                          <th scope="col" style="color:black">Nom</th>
                                          <th scope="col" style="color:black">Prenom</th>
                                          <th scope="col" style="color:black">E-mail</th>
                                          <th scope="col" style="color:black">Garde</th>
                                          <th scope="col" style="color:black"></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($membres as $membre)
                                        <tr>
                                          <td style="color:#2F4F4F">{{$membre->name}}</td>
                                          <td style="color:#2F4F4F">{{$membre->prenom}}</td>
                                          <td style="color:#2F4F4F">{{$membre->email}}</td>
                                          <td style="color:#2F4F4F">{{$membre->grade}}</td>
                                          <td><a class="primary-btn text-uppercase" href="{{ url('membre/'.$membre->id.'/detailsF')}}">Voir Details</a></td>
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

		
        <script src="{{asset('edusmart/js/gmaps.min.js')}}"></script>
        <script src="{{asset('edusmart/js/theme.js')}}"></script>