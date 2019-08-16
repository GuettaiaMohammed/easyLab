@extends('layouts.course')
@section('title','LRI | Details projets')
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
            <h1>Projet</h1>
        </div>
    </div>

    <!-- Popular -->

    <div class="popular page_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center" style="padding-buttom:-50px">
                        <h1>{{ $projet->intitule }}</h1>
                    </div>
                </div>
            </div>
        <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <section class="course_details_area section_gap" style="margin-top:-150px">
                                <div class="col-lg-12 course_details_left"> 
                                    <div class="content_wrapper">
                                        <h2 class="title" style="color:black">Résumé</h4>
                                         <div class="quotes">
                                           {{ $projet->resume }}
                                        </div>
                                    </div>
                                    <div class="content_wrapper">
                                        <h2 class="title" style="color:black">Details</h4>
                                        <div class="content">
                                            
                                        </div>
                                </div>
                            </section>
                        </div>
                    </div>   
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="{{asset($projet->chef->photo)}}" alt="" 
                            style="height:180px;width:180px">
                            <h4>{{$projet->chef->name}} {{$projet->chef->prenom}}</h4>
                            <p>Chef de projet</p>
                            <ul class="menu_social" style="padding-bottom:30px;">
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                            
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Membres de projet</h3>
                            @foreach($membres as $membre)
                            <div class="media post_item">
                                <img class="author_img rounded-circle" 
                                src="{{asset($membre->photo)}}" alt="post" style="height:80px;width:80px">
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
                                @foreach($projet->partenaires as $partenaire)
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>{{$partenaire->nom}}</p>
                                    </a>
                                </li>
                               @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
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