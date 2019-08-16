 @extends('layouts.master')
@extends('layouts.profilCnt')
 @section('title','LRI | Détails article')

@section('header_page')
 	<h1>
    Articles
    <small>Détails</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="{{url('articles')}}">Articles</a></li>
    <li class="active">Détails</li>
  </ol>
@endsection

@section('asidebar')
      <li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="{{url('equipes')}}">
            <i class="fa fa-group"></i> 
            <span>Equipes</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li class="active"><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>

         <li>
          <a href="{{url('theses')}}">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>
      
         <li class="active">
          <a href="{{url('articles')}}">
            <i class="fa fa-newspaper-o"></i> 
            <span>Articles</span></a>
          </li>

           <li>
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>
          <li >
          <a href="{{url('partenaires')}}">
            <i class="fa fa-building-o"></i> 
            <span>Partenaires</span>
          </a>
        </li>

          <li>
          <a href="{{url('materiels')}}">
            <i class="fa fa-desktop"></i> 
            <span>Materiels</span>
          </a>
        </li>
          @if(Auth::user()->role->nom == 'admin' )

          <li>
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Paramètres</span></a>
          </li>
        
          @endif
@endsection

@section('content')
<div class="row">
      <div class="col-md-12">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informations</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-3">
                    <strong>Titre</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$article->titre}}
                    </p>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-3">
                    <strong>Résumé</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->resume }}
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <strong>Type</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->type }}
                    </p>
                  </div>
                </div>
                  <strong><i class="margin-r-5"></i></strong>
                  <hr>
                  <div class="row">
                  <div class="col-md-3">
                    <strong><i class="fa fa-user margin-r-5"></i> Membres internes</strong>
                  </div>
                  <div class="col-md-9">
                    @foreach($membres as $membre)
                    <ul>
                        <li><a href="{{url('membres/'.$membre->id.'/details')}}">{{ $membre->name }} {{ $membre->prenom }}</a></li>
                    </ul>
                    @endforeach
                  </div>
                </div>
                @if($article->membres_ext)
                <div class="row">
                  <div class="col-md-3 " style="padding-top: 20px">
                    <strong><i class="fa fa-user margin-r-5"></i> Membres externes</strong>
                  </div>
                  <div class="col-md-9" style="padding-top: 20px">
                    {{$article->membres_ext}}
                  </div>
                </div>
                @endif
          
                  <strong><i class="margin-r-5"></i></strong>
                  <hr>
                  <div class="row">
                  <div class="col-md-3">
                    <strong><i class="fa fa-phone margin-r-5"></i> Contacts partenaire</strong>
                  </div>
                  <div class="col-md-9">
                       @foreach($contactArticle as $contactA)
                       @foreach($contacts as $contact)
                  
                     @if($article->id==$contactA->article_id  && $contact->id==$contactA->contact_id)
                    <ul>
                        <li><a href="#contact{{$contactA->id}}Modal"   data-toggle="modal">{{ $contact->nom }} {{$contact->prenom}} </a></li>
                    </ul>
                     <div class="modal fade" id="contact{{$contactA->id}}Modal"  aria-labelledby="contact{{$contactA->id}}ModalLabel" aria-hidden="true">

  <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
                                   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
            </button>
          
          </div>
          <div class="modal_body user-details">
                   <div class="user-image">
                <img src="{{asset('uploads/1523947924.png')}}" title="contact photo" class="img-circle">
                  </div>
            <div class="user-info-block ">
                <div class="user-heading">
                    <h3>{{ $contact->nom }} {{ $contact->prenom }}</h3>
                    <span class="help-block">{{$contact->fonction}}</span>
                </div>
               
                <ul class="navigation">
                    <li class="active">
                        <a data-toggle="tab" href="#information{{$contactA->id}}">
                            <span class="glyphicon glyphicon-user"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#settings{{$contact->id}}">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#email{{$contactA->id}}">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#delete{{$contactA->id}}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </li>
                </ul>

                <div class="user-body">
                    <div class="tab-content">
                        <div id="information{{$contactA->id}}" class="tab-pane active">
                                  <div class="row container">
                            <div class="col-md-3">
                              <strong>Nom</strong>
                            </div>
                              <div class="col-md-9">
                              <p class="text-muted">
                              {{$contact->nom}}

                                 </p>
                              </div>
                             </div>
                                 <div class="row container">
                            <div class="col-md-3">
                              <strong>Prénom</strong>
                            </div>
                              <div class="col-md-9">
                              <p class="text-muted">
                              {{$contact->prenom}}

                                 </p>
                              </div>
                             </div>

                                  <div class="row container">
                            <div class="col-md-3">
                              <strong>Fonction</strong>
                            </div>
                              <div class="col-md-9">
                              <p class="text-muted">
                              {{$contact->fonction}}

                                 </p>
                              </div>
                             </div>
                                  <div class="row container">
                            <div class="col-md-3">
                              <strong>Organisme</strong>
                            </div>
                              <div class="col-md-9">
                              <p class="text-muted">
                              <a href="{{url('partenaires/'.$contact->partenaire->id.'/details')}}">{{$contact->partenaire->abg}}</a>

                                 </p>
                              </div>
                             </div>
                                    <div class="row container">
                            <div class="col-md-3">
                              <strong>Nature de coopération</strong>
                            </div>
                              <div class="col-md-9">
                              <p class="text-muted">
                              {{$contact->nature_cooperation}}

                                 </p>
                              </div>
                             </div>

                                           <div class="row container">
                            <div class="col-md-3">
                              <strong>Email</strong>
                            </div>
                              <div class="col-md-9">
                              <p class="text-muted">
                              {{$contact->email}}

                                 </p>
                              </div>
                             </div>
                                           <div class="row container">
                            <div class="col-md-3">
                              <strong>Num Téléphone</strong>
                            </div>
                              <div class="col-md-9">
                              <p class="text-muted">
                              {{$contact->num_tel}}

                                 </p>
                              </div>
                             </div>

                        </div>
        <div id="settings{{$contact->id}}" class="tab-pane">
      <div class=" modal_body text-center">
      Voulez-vous vraiment effectuer la modification ? 
                                   
    <form class="form-inline" action="{{ url('contacts/'.$contact->id.'/edit')}}">
<button  type="button"  class="btn btn-light " data-dismiss="modal">Non</button>                                         
<button  type="submit"  class="btn btn-info">Oui</button>

     </form>

                                 
   </div>
 </div>
<div id="email{{$contactA->id}}" class="tab-pane">
                          


      <div class="row justify-content-center">
        <div class="col-sm-8 ">
          <form>
      
            <div class="form-group" style="width: 500px;">
              <label for="name"><b>Email</b></label>
              <input type="email" name="name" class="form-control" placeholder="@gmail.com">

              
            </div>
       
            <div class="form-group" style="width: 500px;">
              <label for="tel"><b>Message</b></label>
              <textarea class="form-control" rows="6" ></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyez</button>

          </form>
          
        </div>
    </div>
  </div>
<div id="delete{{$contactA->id}}" class="tab-pane">
    <div class="modal-body text-center">
      Voulez-vous vraiment effectuer la suppression ? 
                                   
    <form class="form-inline" action="{{ url('contactts/'.$contactA->id)}}"   method="POST">
       @method('DELETE')
       @csrf                                  
<button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
    <button type="submit" class="btn btn-danger">Oui</button>
     </form>
                                 
   </div>
 </div>
                          
                    </div>
                </div>

            </div>
        </div>
                         
</div>
</div>
</div>
                    @endif
                    @endforeach
                    @endforeach
                    
                     
                  </div>
                </div>

                   <strong><i class="margin-r-5"></i></strong>
                  <hr>

                <div class="row">

                  <div class="col-md-3">
                  <strong><i class="margin-r-5"></i>Nom de la conférence</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->conference }}
                    </p>
                  </div>
                </div>

                <div class="row" style="margin-top: 10px">

                  <div class="col-md-3">
                  <strong>Nom du journal</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->journal }}
                    </p>
                  </div>
                </div>

                <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                  <strong>ISSN</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->ISSN }}
                    </p>
                  </div>
                </div>

                <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                  <strong>ISBN</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->ISBN }}
                    </p>
                  </div>
                </div>

                  <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="row">
                  <div class="col-md-3">
                    <strong><i class="fa fa-map-marker  margin-r-5"></i>Lieu</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->lieu_ville }}, {{ $article->lieu_pays }}
                    </p>
                  </div>
                </div>

                  <strong><i class="margin-r-5"></i></strong>
                <hr>

                <div class="row">
                <div class="col-md-3">
                  <strong><i class="fa fa-calendar margin-r-5"></i>Date</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $article->mois }}, {{ $article->annee }}
                    </p>
                  </div>
                </div>

                <strong><i class="margin-r-5"></i></strong>
                  <hr>

                <div class="row">
                <div class="col-md-3">
                  <strong><i class="fa  fa-link  margin-r-5"></i>DOI</strong>                
                 </div>
                  <div class="col-md-9">
                    <a href="#">{{ $article->doi }}</a>
                  </div> 
                  </div>   
                  
                  @if($article->detail)
                  <div class="row" style="margin-top: 10px">
                    <div class="col-md-3">
                      <strong><i class="fa  fa-link  margin-r-5"></i>Détails</strong>                
                    </div>
                    <div class="col-md-9">
                        <a  href="{{asset( $article->detail)}}">Lien fichier</a>
                    </div> 
                  </div> 
                  @endif
              
            </div>
            <!-- /.box-body -->
          </div>
          
         </div><!-- /.container -->
       </div>
      </div>
@endsection