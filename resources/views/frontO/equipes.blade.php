@extends('layouts.course')
@section('title','LRI | Liste des équipes')
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/courses_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/courses_responsive.css')}}">
@section('content')

<!-- Home -->

	<div class="home" style="height:450px">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url({{url('course/images/4_0.jpg')}})"></div>
		</div>
		<div class="home_content">
			<h1>Equipes</h1>
		</div>
	</div>

	<!-- Popular -->

	<div class="popular page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Nos equipes</h1>
					</div>
				</div>
			</div>

			<div class="row course_boxes">
				@foreach($equipes as $equipe)
				<!-- Popular Course Item -->
				<div class="col-lg-6 course_box">
					<div class="card">
						<img class="card-img-top" src="{{asset($equipe->photo)}}" alt="https://unsplash.com/@kellybrito">
						<div class="card-body text-center">
							<div class="card-title"><a href=" {{ url('equipe/'.$equipe->id.'/detailsF')}} ">{{$equipe->intitule}}</a></div>
							<div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
						</div>
						<div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="@if($equipe->chef) {{asset($equipe->chef->photo)}}  @endif" alt="https://unsplash.com/@mehdizadeh" style="width:45px;height:45px;">
							</div>
							<div class="course_author_name">Chef d'équipe <br><span>@if($equipe->chef){{$equipe->chef->name}} {{$equipe->chef->prenom}}@endif</span></div>
							<a href="{{ url('membre/'.$equipe->chef_id.'/detailsF')}}"><div class="course_price d-flex flex-column align-items-center 
								justify-content-center" style="margin-left:250px"><span><i class="fa fa-eye"></i></span></div></a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection

<script src="{{asset('course/js/courses_custom.js')}}"></script>