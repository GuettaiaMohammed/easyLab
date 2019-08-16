@extends('layouts.master')
@extends('layouts.profilCnt')
 @section('title','LRI | Détails thèse')

@section('header_page')
    <h1>
      Thèse
      <small>Détails</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="{{url('theses')}}">Thèses</a></li>
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
            <li><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>
         <li class="active">
          <a href="{{url('theses')}}">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>
       

        <li>
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
                  <div class="col-md-3">
                    <strong>Titre</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $these->titre}}
                    </p>
                  </div>
                  <div class="col-md-3">
                    <strong>Sujet</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $these->sujet}}
                    </p>
                  </div>
                  
                  <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="col-md-3">
                    <strong><i class="fa fa-user margin-r-5"></i> Présenté par</strong>
                  </div>
                  <div class="col-md-9">
                    <a href="{{url('membres/'.$these->user_id.'/details')}}">{{$these->user->name}} {{$these->user->prenom}}</a>
                  </div>

                  <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="col-md-3">
                    <strong><i class="fa fa-user margin-r-5"></i> Encadreur</strong>
                  </div>
                  <div class="col-md-9">
                    {{ $these->encadreur_int}}
                    
                  </div>

                   <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="col-md-3">
                    <strong><i class="fa fa-user margin-r-5"></i> Encadreur externe</strong>
                  </div>
                  <div class="col-md-9">
                    <a href="#contact{{$these->contact->id}}Modal"   data-toggle="modal">
                    {{$these->contact->nom}} {{$these->contact->prenom}}
                    </a>
                  </div>

                  <div class="modal fade" id="contact{{$these->contact->id}}Modal"  aria-labelledby="contact{{$these->contact->id}}ModalLabel" aria-hidden="true">

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
                    <h3>{{ $these->contact->nom }} {{ $these->contact->prenom }}</h3>
                    <span class="help-block">{{$these->contact->fonction}}</span>
                </div>
               
                <ul class="navigation">
                    <li class="active">
                        <a data-toggle="tab" href="#information{{$these->contact->id}}">
                            <span class="glyphicon glyphicon-user"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#settings{{$these->contact->id}}">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#email{{$these->contact->id}}">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#delete{{$these->contact->id}}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </li>
                </ul>

                <div class="user-body">
                    <div class="tab-content">
                        <div id="information{{$these->contact->id}}" class="tab-pane active">
                                  <div class="row container">
                            <div class="col-md-3">
                              <strong>Nom</strong>
                            </div>
                              <div class="col-md-9">
                              <p class="text-muted">
                              {{$these->contact->nom}}

                                 </p>
                              </div>
                             </div>
                                 <div class="row container">
                            <div class="col-md-3">
                              <strong>Prénom</strong>
                            </div>
                              <div class="col-md-9">
                              <p class="text-muted">
                              {{$these->contact->prenom}}

                                 </p>
                              </div>
                             </div>

                                  <div class="row container">
                            <div class="col-md-3">
                              <strong>Fonction</strong>
                            </div>
                              <div class="col-md-9">
                              <p class="text-muted">
                              {{$these->contact->fonction}}

                                 </p>
                              </div>
                             </div>
                                  <div class="row container">
                            <div class="col-md-3">
                              <strong>Organisme</strong>
                            </div>
                              <div class="col-md-9">
                              <p class="text-muted">
                              <a href="{{url('partenaires/'.$these->contact->partenaire->id.'/details')}}">{{$these->contact->partenaire->abg}}</a>

                                 </p>
                              </div>
                             </div>
                                    

                                           <div class="row container">
                            <div class="col-md-3">
                              <strong>Email</strong>
                            </div>
                              <div class="col-md-9">
                              <p class="text-muted">
                              {{$these->contact->email}}

                                 </p>
                              </div>
                             </div>
                                           <div class="row container">
                            <div class="col-md-3">
                              <strong>Num Téléphone</strong>
                            </div>
                              <div class="col-md-9">
                              <p class="text-muted">
                              {{$these->contact->num_tel}}

                                 </p>
                              </div>
                             </div>

                        </div>
        <div id="settings{{$these->contact->id}}" class="tab-pane">
      <div class=" modal_body text-center">
      Voulez-vous vraiment effectuer la modification ? 
                                   
    <form class="form-inline" action="{{ url('contacts/'.$these->contact->id.'/edit')}}">
<button  type="button"  class="btn btn-light " data-dismiss="modal">Non</button>                                         
<button  type="submit"  class="btn btn-info">Oui</button>

     </form>

                                 
   </div>
 </div>
<div id="email{{$these->contact->id}}" class="tab-pane">
                          


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
<div id="delete{{$these->contact->id}}" class="tab-pane">
    <div class="modal-body text-center">
      Voulez-vous vraiment effectuer la suppression ? 
                                   
    <form class="form-inline" action="{{ url('contacts/'.$these->contact->id)}}"   method="POST">
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

                  <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="col-md-3">
                    <strong><i class="fa fa-user margin-r-5"></i> Coencadreur</strong>
                  </div>
                  <div class="col-md-9">
                    {{ $these->coencadreur_int }}
                    {{ $these->coencadreur_ext }}
                  </div>

                  <strong><i class="margin-r-5"></i></strong>
                <hr>
                <div class="col-md-3">
                  <strong><i class="fa fa-calendar margin-r-5"></i>Date d'inscription</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $these->date_debut}}
                    </p>
                  </div>

                <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="col-md-3">
                  <strong><i class="fa fa-calendar margin-r-5"></i>Date de soutenance</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $these->date_soutenance}}
                    </p>
                  </div>

                   <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  @if($these->detail)
                   <div class="col-md-3">
                    
                  <strong><i class="fa fa-calendar margin-r-5"></i>Détails</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      <a href="{{asset( $these->detail)}}">Lien fichier</a>
                    </p>
                  </div>
                  @endif
   
              
            </div>
            <!-- /.box-body -->
          </div>
          
         </div><!-- /.container -->
       </div>
      </div>
@endsection