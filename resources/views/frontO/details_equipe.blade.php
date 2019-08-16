@extends('layouts.course')
@section('title','LRI | Details équipe')
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
  <link rel="stylesheet" type="text/css" href="{{asset('course/styles/teachers_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/teachers_responsive.css')}}">
@section('content')

<!-- Home -->

  <div class="home" style="height:450px">
    <div class="home_background_container prlx_parent">
      <div class="home_background prlx" style="background-image:url({{url('course/images/AdobeStock_99809203_Preview.jpeg')}})"></div>
    </div>
    <div class="home_content">
      <h1>Equipe</h1>
    </div>
  </div>

  <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{asset($equipe->photo)}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2>{{$equipe->intitule}}</h2>
                        </div>
                        <div class="col-lg-12" style="margin-top:-100px">
                            <section class="course_details_area section_gap">
                            <div class="col-lg-12 course_details_left" style="padding-bottom:-200px"> 
                                <div class="content_wrapper">
                                    <h2 class="title" style="color:black">Résumé</h2>
                                        <div class="quotes">
                                            {{$equipe->resume}}
                                        </div>
                                </div>
                            </div>
                        </section>
                            
                        </div>  

                     </div>

<section class="course_details_area section_gap" style="margin-top:-230px">
                <div class="col-lg-12 course_details_left"> 
                    <div class="content_wrapper">
                        <h2 class="title" style="color:black">Projets de l'équipe</h2>
                        <div class="content">
                            <ul class="course_list">
                                @foreach($membres as $membre)
                                    @foreach($projets as $projet)
                                    @if($membre->id == $projet->user_id )
                                         
                                <li class="justify-content-between d-flex">
                                    
                                    <p>{{$projet->users->intitule}}</p>
                                    <a class="primary-btn text-uppercase" href="#">View Details</a>
                                </li>

                                @endif
                               @endforeach
                               @endforeach
   
                            </ul>
                        </div>
                    </div>
                </div>
</section>
                </div>

                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="{{asset($equipe->chef->photo)}}" alt="">
                            <h4>{{$equipe->chef->name}} {{$equipe->chef->prenom}}</h4>
                            <p>Chef d'équipe</p>
                            <ul class="menu_social" style="padding-bottom:30px;">
                  <li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                  <li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                  <li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                  <li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
              </ul>
                            
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Membres de l'équipe</h3>
                            @foreach($membres as $membre)
                            <div class="media post_item">
                                <img class="author_img rounded-circle" 
                                src="{{asset($membre->photo)}}" style="height:80px;width:80px" alt="post">
                                <div class="media-body">
                                    <a href="{{ url('membre/'.$membre->id.'/detailsF')}}">
                                        <h3>{{$membre->name}} {{$membre->prenom}}</h3>
                                    </a>
                                    <p>{{$membre->grade}}</p>
                                </div>
                            </div>
                            @endforeach
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Partenaires</h3>
                            <ul class="list cat-list">
                                  @foreach($membres as $membre)
                                    @foreach($projets as $projet)

                                    @if($membre->id == $projet->chef_id)
                                    @foreach($projet->partenaires as $partenaire)
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>{{$partenaire->nom}}</p>
                                    </a>
                                </li>
                                @endforeach
                                @endif
                               @endforeach
                               @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
    </div>
    </div>
</section>
@endsection


        <script src="{{asset('edusmart/js/gmaps.min.js')}}"></script>
        <script src="{{asset('edusmart/js/theme.js')}}"></script>
