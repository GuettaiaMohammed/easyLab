@extends('layouts.course')
@section('title','LRI | details')
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/news_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/news_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/news_post_styles.css.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/news_post_responsive.css')}}">
@section('content')

<!-- Home -->

	<div class="home" style="height:450px">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url({{url('course/images/AdobeStock_116397061_Preview.jpeg')}})"></div>
		</div>
		<div class="home_content">
			<h1>Actualité</h1>
		</div>
	</div>

	<!-- News -->

	<div class="news">
		<div class="container">
			<div class="row">
				
				<!-- News Post Column -->

				<div class="col-lg-8">
					
					<div class="news_post_container">
						<!-- News Post -->
						<div class="news_post">
							<div class="news_post_image">
								<img src="{{asset($actualitesF->photo)}}" alt="https://unsplash.com/@dsmacinnes">
							</div>
							<div class="news_post_top d-flex flex-column flex-sm-row">
								<div class="news_post_date_container">
									<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
						<div>{{date('d', strtotime($actualitesF->date_publication))}}</div>
                        <div>{{date('M', strtotime($actualitesF->date_publication))}}</div>
									</div>
								</div>
								<div class="news_post_title_container">
									<div class="news_post_title">
										<a href="news_post.html">{{$actualitesF->titre}}</a>
									</div>
									<div class="news_post_meta">
										@foreach($actualitesF->users as $user)
										<span class="news_post_author"><a href="#">By {{ $user->name }} {{ $user->prenom }}</a></span>
										@endforeach
									
										
									</div>
								</div>
							</div>
							<div class="news_post_text">
								<p>{{$actualitesF->resume}}</p>
							</div>

					

							<p class="news_post_text" style="margin-top: 59px;">
								{{$actualitesF->texte}} </p>
						</div>

					</div>
				</div>
		</div>

	</div>
</div>

@endsection
<script src="{{asset('course/js/news_post_custom.js')}}"></script>
