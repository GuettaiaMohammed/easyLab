@extends('layouts.course')
@section('title','LRI | Home')
@section('content')

<!-- Home -->

	<div class="home" style="height:600px ; background-image:url({{url('course/images/logiciel.jpg')}});background-repeat: no-repeat;background-size: cover;
	background-position: center center;">

		<div class="hero_slide_content text-center px-2" style="padding-top:250px; margin-left:120px;">
			<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
				Labo de recherche <span>Informatique</span></h1>
		</div>

	</div>

	<div class="hero_boxes">
		<div class="hero_boxes_inner">
			<div class="container">
				<div class="row">

					<div class="col-lg-4 hero_box_col">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="{{asset('course/images/group.svg')}}" class="svg" alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Nos équipes</h2>
								<a href="{{url('listeEquipe')}}" class="hero_box_link">Voir plus</a>
							</div>
						</div>
					</div>

					<div class="col-lg-4 hero_box_col">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="{{asset('course/images/checklist.svg')}}" class="svg" alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Nos projets</h2>
								<a href="{{url('projects')}}" class="hero_box_link">Voir plus</a>
							</div>
						</div>
					</div>

					<div class="col-lg-4 hero_box_col">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="{{asset('course/images/story.svg')}}" class="svg" alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Nos théses</h2>
								<a href="{{url('thesesF')}}" class="hero_box_link">Voir plus</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Events -->

	<div class="events page_section">
		<div class="container">
			
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Actualités récentes</h1>
					</div>
				</div>
			</div>
			
			<div class="event_items">

				@foreach($listactualite as $actualite)
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
						<div class="event_day">{{date('d', strtotime($actualite->date_publication))}}</div>
						<div class="event_month">{{date('M',strtotime($actualite->date_publication))}}</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="{{url('actualitesF/'.$actualite->id.'/detailsF')}}">{{$actualite->titre}}</a>
									</div>
								
									<div class="event_location">
									</div>
									

									<p>{{$actualite->resume}}</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<img src="{{asset($actualite->photo)}}" alt="https://unsplash.com/@theunsteady5">
								</div>
							</div>

						</div>	
					</div>
				</div>
           <!-- Event Item -->
		    @endforeach

			</div>
				
		</div>
	</div>

	
	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			

			<!-- Footer Content -->

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-3 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<img src="images/logo.png" alt="">
								<span>A propos</span>
							</div>
						</div>

						<p class="footer_about_text">Le LRI, Laboratoire Mixte de Recherche de l'Université de Tlemcen, est un laboratoire de recherche en informatique se consacrant à la modélisation et la résolution de problèmes fondamentaux motivés par les applications.</p>

					</div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Menu</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="#">Acceuil</a></li>
								<li class="footer_list_item"><a href="#">A propos</a></li>
								<li class="footer_list_item"><a href="courses.html">Membres</a></li>
								<li class="footer_list_item"><a href="news.html">Equipes</a></li>
								<li class="footer_list_item"><a href="news.html">Projets</a></li>
								<li class="footer_list_item"><a href="news.html">Actualités</a></li>
								<li class="footer_list_item"><a href="contact.html">Contact</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Usefull Links -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Usefull Links</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="#">Testimonials</a></li>
								<li class="footer_list_item"><a href="#">FAQ</a></li>
								<li class="footer_list_item"><a href="#">Community</a></li>
								<li class="footer_list_item"><a href="#">Campus Pictures</a></li>
								<li class="footer_list_item"><a href="#">Tuitions</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Contact -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Contact</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="{{asset('course/images/placeholder.svg')}}" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									Blvd Libertad, 34 m05200 Arévalo
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="{{asset('course/images/smartphone.svg')}}" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									0034 37483 2445 322
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="{{asset('course/images/envelope.svg')}}" alt="https://www.flaticon.com/authors/lucy-g">
									</div>hello@company.com
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>


		</div>
	</footer>

@endsection