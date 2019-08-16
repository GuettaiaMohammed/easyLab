@extends('layouts.master')
@extends('layout.calendar')
@section('title','LRI | Profil')

@section('header_page')

	  <h1>
        Profil
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Profil</li>
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
        
        <li class="treeview active">
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

         <li>
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
        <div class="col-md-3">

          
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src=" {{asset($membre->photo)}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$membre->name}} {{$membre->prenom}}</h3>

              <p class="text-muted text-center">{{$membre->grade}}</p>
              <div class="text-center">
                <div class="btn-group">
              <a href="{{$membre->lien_linkedin}}" class="btn btn-social-icon btn-linkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a>
              <a href="{{$membre->lien_rg}}" class="btn btn-social-icon" title="Researchgate"><img src="{{asset('/rg.png')}}"></a>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
    
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">A propos</a></li>
              @if(Auth::id() == $membre->id || Auth::user()->role->nom == 'admin' )
              <li><a href="#activity1" data-toggle="tab">Modifier</a></li>
              @endif
              <li><a href="#timeline" data-toggle="tab">Articles</a></li>
              <li><li><a href="#calendar" data-toggle="tab">Calendrier des stages</a></li>
              <li><a href="#timeline1" data-toggle="tab">Actualités</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="box-body">
                  @if($membre->date_naissance && ( $membre->autorisation_public_date_naiss || Auth::user()->role->nom == 'admin' || Auth::id() == $membre->id))
                  <div class="row">
                  <div class="col-md-3">
                    <strong>Date de naissance</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$membre->date_naissance}}
                    </p>
                  </div>
                  </div>
                  @endif

                  @if($membre->num_tel && ( $membre->autorisation_public_date_naiss || Auth::user()->role->nom == 'admin' || Auth::id() == $membre->id))
                  <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                    <strong>N° de télépone</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$membre->num_tel}}
                    </p>
                  </div>
              	  </div>
                  @endif

                  @if($membre->equipe_id)
                <div class="row" style="margin-top: 10px">
                <div class="col-md-3">
                  <strong><i class="fa fa-group  margin-r-5"></i>Equipe</strong>                
                 </div>
                  <div class="col-md-9">
                    <a href="#">{{$membre->equipe->intitule}}</a>
                  </div>
                </div>
                @endif

                <div class="row" style="margin-top: 10px">
                 <div class="col-md-3" style="padding-top: 10px">
                   <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
                 </div> 
                 <div class="col-md-9" style="padding-top: 10px">
                   {{$membre->email}}
                 </div>
                </div>

                <div class="row" style="margin-top: 10px">
                 <div class="col-md-3" style="padding-top: 10px">
                   <strong><i class=" margin-r-5"></i>Materiels réservé</strong>
                 </div> 
                 <div class="col-md-9" style="padding-top: 10px">
                  @foreach($materiels as $materiels)
                   <li>{{ $materiels->nom }} </li>
                   @endforeach
                 </div>
                </div>


              <strong><i class="margin-r-5"></i></strong>
              <hr>
              @if($membre->these)
                <div class="col-md-3">
                  <strong><i class="fa fa-graduation-cap margin-r-5"></i> Thèse </strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      <strong> Titre : </strong> {{$membre->these->titre}}
                      </p>
                    <p class="text-muted">
                      
                      <strong>Résumé :</strong>  {{$membre->these->sujet}}
                    </p>
                     <p class="text-muted">
                      <strong>Encadreur :</strong> {{$membre->these->encadreur_int}}{{$membre->these->encadreur_ext}}
                      </p>
                      <p class="text-muted">
                     <strong>Coencadreur :</strong> {{$membre->these->coencadreur_int}}{{$membre->these->coencadreur_ext}}
                     </p>
                    
                  </div>
                @endif

            </div>
              </div>



            
              <div class="tab-pane" id="timeline">
                 <div class="box-body" style="padding-top: 30px;">

                  <div class="pull-right">
                <a href="{{url('articles/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"> Nouvel article</i></a>
              </div>
                   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Type</th>
                  <th>Titre</th>
                  <th>Année</th>
                  @if((Auth::id() != $membre->id))
                  <th>Actions</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                  @foreach ($membre->articles as $article) 
                  <tr>
                    <td>{{$article->type}}</td>
                    <td>{{$article->titre}}</td>
                
                    <td>{{$article->annee}}</td>
                    <td>
                     
                      <div class="btn-group">
                        <form action="{{ url('articles/'.$article->id)}}" method="post">
                          
                          {{csrf_field()}}
                          {{method_field('DELETE')}}

                        <a href="{{ url('articles/'.$article->id.'/details')}}" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        @if(Auth::user()->role->nom == 'admin' || Auth::user()->id == $article->deposer)
                        <a href="{{ url('articles/'.$article->id.'/edit')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        @endif
                        @if( Auth::user()->role->nom != 'membre' || Auth::user()->id == $article->deposer)
                        <button type="submit" class="btn btn-danger ">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        @endif
                        </form>
                      </div>
                      
                    </td>
                  </tr>
                  @endforeach
                 </tbody>
                <tfoot>
                <tr>
                  <th>Titre</th>
                  <th>Type</th>
                  
                  <th>Année</th>
                  @if((Auth::id() != $membre->id))
                  <th>Actions</th>
                  @endif
                </tr>
                </tfoot>
              </table>
            </div>
              </div>
               <div class="tab-pane" id="calendar">

           <div class="box-body" style="padding-top: 30px;">
               

   <div class="container">
    <div class="row">
      <div >
        @foreach ($contactUser as $contact) 
           
           @foreach($membre->contacts as $cont)
             @if($contact->contact_id == $cont->id )
        <ul class="event-list" style="padding-bottom: 10px;">
          <li>
            
            <time >
              <span class="day">{{date('d', strtotime($contact->start_date))}}</span>
              <span class="month">{{$contact->mois}}</span>
              

            
            </time>
           
            <div class="info text-center">
              <h2 class="title">{{$contact->title}}</h2>
              <p>&nbsp;&nbsp;Mr.{{$cont->nom}} {{$cont->prenom}}</p>
              <p>&nbsp;&nbsp;de {{$contact->start_date}} à {{$contact->end_date}}</p>
               
            </div>

            <div class="social">
              <ul >
              
                <li class="facebook" style="width:33%;padding-top: 5px;">
                  @if(Auth::user()->role->nom != 'membre' )
                  <a href="{{url('stages/'.$contact->id.'/edit')}}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                  @endif
                </li>
                <li class="twitter" style="width:34%;padding-top: 5px;">
                  @if(Auth::user()->role->nom != 'membre' )
                    <a href="#supprimer{{ $contact->id }}Modal" role="button" class="btn btn-default" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                   <div class="modal fade" id="supprimer{{ $contact->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $contact->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                   
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ? 
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('stages/'.$contact->id)}}"  method="POST">
                                          @method('DELETE')
                                          @csrf
                                      <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                          <button type="submit" class="btn btn-danger">Oui</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endif
                </li>
           
              </ul>
            </div>
          </li>
   
        </ul>
        @endif
           @endforeach
        @endforeach

         @if(Auth::user()->role->nom != 'membre' )
              <div class=" pull-left">
                <a href="{{url('stages/'.$membre->id.'/create')}}" type="button" class="btn btn-block btn-success "><i class="fa fa-plus"></i> stage</a>
              </div>
        @endif
      </div>
    </div>
  </div>



              </div>
              </div>
        
              <div class="tab-pane" id="timeline1">
                 <div class="box-body" style="padding-top: 30px;">
                
            @if(Auth::id() == $membre->id )
                  <div class="pull-right">
                <a href="{{url('actualites/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"> Nouvelle artualité</i></a>
              </div>
              @endif
                   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titre</th>
                  <th>résumé</th>
   
                  <th>Date de pubication</th>
                  <th>Actions</th>
           
                </tr>
                </thead>
                <tbody>
                 @foreach ($membre->actualites as $actualite)
                  <tr>
                    <td>{{$actualite->titre}}</td>
                    <td>{{$actualite->resume}}</td>
                
                    <td>{{date('Y-m-d', strtotime($actualite->date_publication))}}</td>
                    <td>
                     
                      <div class="btn-group">
                       
                        <form action="" method="post">
                          
                          {{csrf_field()}}
                          {{method_field('DELETE')}}

                        <a href="#contact{{$actualite->id}}Modal"   data-toggle="modal" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
               <div class="modal fade" id="contact{{$actualite->id}}Modal"  aria-labelledby="contact{{$actualite->id}}ModalLabel" aria-hidden="true">

                     <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                                   
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
          
                          </div>
                         <div class="modal_body">
                            </div class= "text-center" >
                                <h2 style=" text-align: center; font-family:'Comic Sans MS'">{{$actualite->titre}}</h2>
                             <div>
                            <div  >
                              <img src="{{asset($actualite->photo)}}"  width="600" height="200">  
                             </div>

                             <div class="text-center">
                              <h3>{{$actualite->resume}}</h3>
                             </div>
                             <div><h4>&nbsp;&nbsp;&nbsp;&nbsp;{{$actualite->texte}}</h4></div>
                         </div>
                       </div>
                     </div>
                   </div>
                     @if( Auth::user()->id == $actualite->deposer )
                        <a href="{{ url('actualites/'.$actualite->id.'/edit')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                      @endif
                       @if(Auth::user()->role->nom == 'admin' || Auth::user()->id == $actualite->deposer )
                        <button type="submit" class="btn btn-danger ">
                            <i class="fa fa-trash-o"></i>
                        </button>
                       @endif
                        </form>
                      </div>
                      
                    </td>
                  </tr>
                 @endforeach
                 </tbody>
          
              </table>
            </div>
              </div>



          <div class="tab-pane" id="activity1">
            <form class="well form-horizontal" action=" {{url('membres/'. $membre->id) }} " method="post"  id="contact_form">

            	<input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}

              <fieldset>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Nom</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('name')) has-error @endif">
                          <div class="input-group"  style="width: 40%">
                            <input  name="name" class="form-control" value="{{$membre->name}}" type="text">
                            <span class="help-block">
                                @if($errors->get('name'))
                                  @foreach($errors->get('name') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                      </div>

                       <!-- Text input-->

                      <div class="form-group">
                        <label class="col-md-3 control-label">Prénom</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('prenom')) has-error @endif">
                          <div class="input-group"  style="width: 40%">
                            <input  name="prenom" value="{{$membre->prenom}}" class="form-control"  type="text">
                            <span class="help-block">
                                @if($errors->get('prenom'))
                                  @foreach($errors->get('prenom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                      </div>


                       <div class="form-group"> 
                          <label class="col-md-3 control-label">Grade</label>
                            <div class="col-md-9 selectContainer @if($errors->get('grade')) has-error @endif">
                              <div class="input-group" style="width: 40%">
                                  <select name="grade" class="form-control selectpicker">
                                  	<option>{{$membre->grade}}</option>
                                    <option>MAA</option>
                                    <option>MAB</option>
                                    <option >MCA</option>
                                    <option >MCB</option>
                                    <option>Doctorant</option>
                                    <option >Professeur</option>
                                  </select>
                                  <span class="help-block">
                                @if($errors->get('grade'))
                                  @foreach($errors->get('grade') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                              </div>
                            </div>
                      </div>

                      @if((Auth::user()->role->nom == 'admin') && (Auth::id() != $membre->id))
                      <div class="form-group">
                         <label class="col-md-3 control-label">Role</label>
                             <div class="col-md-9 inputGroupContainer">
                               <div class="input-group"  style="width: 40%">
                                  <select class="form-control" id="role_id" lass="form-control" name="role_id">
                                        @foreach($roles as $role)
                                     <option value="{{ $role->id }}{{ ($membre->role_id == $role->id) ? 'selected' : '' }}">{{ $role->nom }}</option>
                                        @endforeach
                                  </select>
                                </div>
                              </div>
                          </div>
                        @endif


                      <div class="form-group"> 
                          <label class="col-md-3 control-label">Equipe</label>
                            <div class="col-md-9 selectContainer @if($errors->get('equipe')) has-error @endif">
                              <div class="input-group"  style="width: 40%">
                                  <select name="equipe_id" class="form-control selectpicker">
                                    <option value="{{$membre->equipe_id}}">{{$membre->equipe->intitule}}</option>
                                    @foreach($equipes as $equipe)
                                    <option value="{{$equipe->id}}">{{$equipe->intitule}}</option>
                                    @endforeach
                                    
                                  </select>
                                  <span class="help-block">
                                @if($errors->get('equipe_id'))
                                  @foreach($errors->get('equipe_id') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                              </div>
                            </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label">E-Mail</label>  
                          <div class="col-md-9 inputGroupContainer @if($errors->get('email')) has-error @endif">
                            <div class="input-group"  style="width: 40%">
                                <input name="email" type="email" class="form-control" value="{{$membre->email}}">
                                <span class="help-block">
                                @if($errors->get('email'))
                                  @foreach($errors->get('email') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                            </div>
                          </div>
                      </div>
                       @if((Auth::id() == $membre->id))
                      <div class="form-group">
                        <label class="col-md-3 control-label">Password</label>  
                          <div class="col-md-9 inputGroupContainer">
                            <div class="input-group"  style="width: 40%">
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder ="Entrez un nouveau mot de passe">
                            </div>
                          </div>
                      </div>
                      @endif

                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group">
                            <label class="col-md-6 control-label">Date_Naissance</label>  
                            <div class="col-md-6 inputGroupContainer input-group Date">
                              <input name="date_naissance" type="text" class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker" value="{{$membre->date_naissance}}">
                            </div>
                      </div>
                      </div>
                      <div class="col-md-1">
                      <div class="form-group" title="Publique?">
                            <label class="col-md-4 control-label">
                              <input name="autorisation_public_date_naiss" type="checkbox" class="flat-red" value="{{$membre->autorisation_public_date_naiss}}" @if($membre->autorisation_public_date_naiss) checked @endif>
                            </label> 
                           </div>
                         </div>
                    </div>

                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group">
                              <label class="col-md-6 control-label">N° Téléphone</label>  
                                <div class="col-md-6 input-group">
                                <input name="num_tel" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="{{$membre->num_tel}}">
                              </div>
                        </div>
                      </div>
                      <div class="col-md-1">
                      <div class="form-group" title="Publique?">
                            <label class="col-md-4 control-label">
                              <input name="autorisation_public_num_tel" type="checkbox" class="flat-red" value="{{$membre->autorisation_public_num_tel}}" @if($membre->autorisation_public_num_tel) checked @endif >
                            </label> 
                           </div>
                         </div>
                    </div>

                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group">
                              <label class="col-md-6 control-label">Linkedin</label>  
                                <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                <input name="lien_linkedin" type="text" class="form-control" value ="{{$membre->lien_linkedin}}">
                              </div>
                              </div>
                        </div>
                     </div>
                     <!-- <div class="col-md-1">
                      <div class="form-group" title="Publique?">
                            <label class="col-md-4 control-label">
                              <input name="autorisation_public_linkedin" type="checkbox" class="flat-red" value="{{$membre->autorisation_public_linkedin}}">
                            </label> 
                           </div>
                         </div> -->
                    </div>

                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group">
                              <label class="col-md-6 control-label">ResearshGate</label>  
                                <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                <input name="lien_rg" type="email" class="form-control" value="{{$membre->lien_rg}}">
                              </div>
                              </div>
                          </div>
                     </div>
                     <!-- <div class="col-md-1">
                      <div class="form-group" title="Publique?">
                            <label class="col-md-4 control-label">
                              <input name="autorisation_public_rg" type="checkbox" class="flat-red" value= "{{$membre->autorisation_public_linkedin}}">
                            </label> 
                           </div>
                         </div> -->
                    </div>

              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('membres')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->

  
            <!-- /.box-body -->
  </div>
        </div>
      </div>

@endsection