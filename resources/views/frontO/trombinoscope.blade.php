@extends('layouts.course')
@section('title','LRI | Membres')
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/teachers_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/teachers_responsive.css')}}">
@section('content')

<!-- Home -->

    <div class="home" style="height:450px">
        <div class="home_background_container prlx_parent">
            <div class="home_background prlx" style="background-image:url({{url('course/images/AdobeStock_105486712_Preview.jpeg')}})"></div>
        </div>
        <div class="home_content">
            <h1>Nos membres</h1>
        </div>
    </div>

    <!-- Teachers -->

    <div class="teachers page_section">
        <div class="container">
            <div class="row">
                @foreach($membres as $membre)
                <!-- Teacher -->
                <div class="col-lg-3 teacher">
                    <div class="card">
                        <div class="card_img">
                            <div class="card_plus trans_200 text-center"><a href="{{ url('membre/'.$membre->id.'/detailsF')}}">+</a></div>
                            <img class="card-img-top trans_200" src="{{asset($membre->photo)}}" alt="https://unsplash.com/@michaeldam">
                        </div>
                        <div class="card-body text-center">
                            <div class="card-title"><a href="{{ url('membre/'.$membre->id.'/detailsF')}}">{{$membre->name}} {{$membre->prenom}} </a></div>
                            <div class="card-text">{{$membre->grade}} </div>
                            <div class="teacher_social">
                                <ul class="menu_social">
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>

@endsection
<script src="{{asset('course/js/teachers_custom.js')}}"></script>