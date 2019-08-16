@extends('layouts.course')
@section('title','LRI | Membre')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/membre_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/courses_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/courses_responsive.css')}}">
@section('content')



<!-- Home -->

    <div class="home" style="height:630px">
        <div class="home_background_container prlx_parent">
            <div class="home_background prlx" style="background-image:url({{url('course/images/AdobeStock_238552729_Preview.jpeg')}})"></div>
        </div>
        <div class="home_content">
            <h1>Profile</h1>
        </div>
    </div>
<div style=" background-image: linear-gradient(to right, #FFA500,white);padding-top:20px;padding-bottom:20px;">
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img" style="height:200px">
                            <img src="{{asset($membre->photo)}}" alt=""/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    
                                <p class="proile-rating"> <h5>
                                        {{$membre->name}} {{$membre->prenom}}
                                    </h5>
                                    <h6>
                                        {{$membre->grade}}
                                    </h6>
                                </p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="padding-top:40px">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">A propos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Articles</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>PROJETS</p>
                            @foreach($projets as $projets)
                            <a href="#">{{$projets->intitule}}</a><br/>
                            @endforeach

                            @if($membre->these)
                            <p>THESE</p>
                            <a href="#"><strong style="color:black">Titre : </strong>{{$membre->these->titre}}</a><br/>
                            <a href="#"><strong style="color:black">Sujet : </strong>{{$membre->these->sujet}}</a><br/>
                            <a href="#"><strong style="color:black">Encadreurs : </strong>{{$membre->these->encadreur_int}},{{$membre->these->encadreur_ext}}</a><br>
                            <a href="#"><strong style="color:black">Coencadreur : </strong>{{$membre->these->coencadreur_int}},{{$membre->these->coencadreur_ext}}</a><br>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$membre->name}} {{$membre->prenom}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date de naissance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$membre->date_naissance}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$membre->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$membre->num_tel}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Grade</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$membre->grade}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Equipe</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$membre->equipe->intitule}}</p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                  <th style="color:black">Type</th>
                                                  <th style="color:black">Titre</th>
                                                  <th style="color:black">Année</th>
                                                  <th style="color:black">Lieu</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($membre->articles as $article) 
                                                  <tr>
                                                    <td style="color:#2F4F4F">{{$article->type}}</td>
                                                    <td style="color:#2F4F4F">{{$article->titre}}</td>
                                                
                                                    <td style="color:#2F4F4F">{{$article->annee}}</td>
                                                    <td style="color:#2F4F4F">{{$article->lieu_ville}}&nbsp;,&nbsp;{{$article->lieu_pays}}</td>
                                                    
                                                  </tr>
                                                  @endforeach
                                                 </tbody>
                                              </table>
                                        </div>
                                        
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
</div>
@endsection