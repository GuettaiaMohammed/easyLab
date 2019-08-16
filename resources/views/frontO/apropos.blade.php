@extends('layouts.course')
@section('title','LRI | A propos')
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/elements_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/elements_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/news_post_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('course/styles/news_post_responsive.css')}}">
@section('content')

<!-- Home -->

    <div class="home" style="height:450px">
        <div class="home_background_container prlx_parent">
            <div class="home_background prlx" style="background-image:url({{url('course/images/depositphotos.jpg')}})"></div>
        </div>
        <div class="home_content">
            <h1>Presentation</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="news_post_quote">
                <p class="news_post_quote_text"><span>L</span>e LRI, Laboratoire Mixte de Recherche de l' <strong>Université de Tlemcen</strong> , est un laboratoire de recherche en <strong>informatique</strong> se consacrant à la modélisation et la résolution de problèmes fondamentaux motivés par les applications, ainsi qu'à la mise en oeuvre et la validation des solutions au travers de partenariats académiques comme le département de Mathématique et de Physique Electronique.
<br>Les axes fédérateurs sont :
<br>Sûreté, sécurité, fiabilité ;
<br>Science des données, intelligence et optimisation ; <br>Systèmes communicants.
<br>Le LRI répond à ces challenges à différents niveaux thématiques au sein des 3 départements.
<br>Bien que récemment agréé et créé, le LRI est doté déja d'une composante humaine assez riche et multidisciplinaire. Le LRI est composé de 33 chercheurs, 1 ingénieur et 1 secrétaire. Il accueille plus d'une dizaine de doctorants, près d'une trentaine de MA, 4MC et un professeur. La recherche est organisée en quatre équipes regroupées en plusieures thématiques : Systèmes Intelligents, Données et Apprentissage Artificiel, Réseaux et Systèmes,  Modélisation et Optimisation, Web sémantique. 
<br>La production scientifique est en moyenne d'une vintaine de publications par an.
<br>La coopération internationale est une nécessité pour notre laboratoire Il entretient des relations suivies avec des universités françaises et tunisiennes. En complément de la recherche académique, le LRI a une récente coopération avec le monde industriel et des partenaires socio économiques.
<br>Le laboratoire est grandement impliqué dans des enseignements liés à la recherche en master (Master Réseaux, Master Génie Logiciel, Master SIC et MID). L'école doctorale "Réseaux et Services" du département Informatique de l'Université de Tlemcen accueille les doctorants du laboratoire.</p>
            </div>
        </div>
    </div>

<!-- Milestones -->
        
            <div class="milestones_container">
                <div class="milestones_background" style="background-image:url({{url('course/images/milestones_background.jpg')}})"></div>
                
                <div class="container">
                    <div class="row">
                        
                        <!-- Milestone -->
                        <div class="col-lg-3 milestone_col">
                            <div class="milestone text-center">
                                <div class="milestone_icon"><img src="{{asset('course/images/group.svg')}}" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
                                <div class="milestone_counter" data-end-value="">{{$equipes}}</div>
                                <div class="milestone_text">Equipes</div>
                            </div>
                        </div>

                        <!-- Milestone -->
                        <div class="col-lg-3 milestone_col">
                            <div class="milestone text-center">
                                <div class="milestone_icon"><img src="{{asset('course/images/milestone_2.svg')}}" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
                                <div class="milestone_counter" data-end-value="">{{$membres}}</div>
                                <div class="milestone_text">Membres</div>
                            </div>
                        </div>

                        <!-- Milestone -->
                        <div class="col-lg-3 milestone_col">
                            <div class="milestone text-center">
                                <div class="milestone_icon"><img src="{{asset('course/images/checklist.svg')}}" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
                                <div class="milestone_counter" data-end-value="">{{$articles}}</div>
                                <div class="milestone_text">Articles</div>
                            </div>
                        </div>

                        <!-- Milestone -->
                        <div class="col-lg-3 milestone_col">
                            <div class="milestone text-center">
                                <div class="milestone_icon"><img src="{{asset('course/images/story.svg')}}" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
                                <div class="milestone_counter" data-end-value="" data-sign-before="+">{{$theses}}</div>
                                <div class="milestone_text">Théses</div>
                            </div>
                        </div>

                    </div>
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

<script src="{{asset('course/js/elements_custom.js')}}"></script>
