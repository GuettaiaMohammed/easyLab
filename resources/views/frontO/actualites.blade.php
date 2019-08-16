@extends('layouts.course')
@section('title','LRI | Actualités')
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/news_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/news_responsive.css')}}">
@section('content')

<!-- Home -->

  <div class="home" style="height:450px">
    <div class="home_background_container prlx_parent">
      <div class="home_background prlx" style="background-image:url({{url('course/images/AdobeStock_116397061_Preview.jpeg')}})"></div>
    </div>
    <div class="home_content">
      <h1>Actualités</h1>
    </div>
  </div>

<!-- News -->

  <div class="news">
    <div class="container">
      <div class="row">
        
        <!-- News Column -->

        <div class="col-lg-8">
          
          <div class="news_posts">
            @foreach($actualitesF as $actualite)
            <div class="news_post">
              <div class="news_post_image">
                <img src="{{asset($actualite->photo)}}" alt="https://unsplash.com/@dsmacinnes">
              </div>
              <div class="news_post_top d-flex flex-column flex-sm-row">
                <div class="news_post_date_container">
                  <div class="news_post_date d-flex flex-column align-items-center justify-content-center">
                    <div>{{date('d', strtotime($actualite->date_publication))}}</div>
                    <div>{{date('M', strtotime($actualite->date_publication))}}</div>
                  </div>
                </div>
                <div class="news_post_title_container">
                  <div class="news_post_title">
                    <a href="{{url('actualitesF/'.$actualite->id.'/detailsF')}}">{{$actualite->titre}}</a>
                  </div>
                  <div class="news_post_meta">
                    @foreach($actualite->users as $user)
                    <span class="news_post_author"><a href="#">By {{ $user->name }} {{ $user->prenom }}</a></span>
                    @endforeach
                   
                  </div>
                </div>
              </div>
              <div class="news_post_text">
                <p>{{$actualite->resume}}</p>
              </div>
              <div class="news_post_button text-center trans_200">
                <a href="{{url('actualitesF/'.$actualite->id.'/detailsF')}}">Read More</a>
              </div>
            </div>
             @endforeach
          </div>
@endsection
<script src="{{asset('course/js/news_custom.js')}}"></script>