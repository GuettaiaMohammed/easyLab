@extends('layouts.master')

@section('title','LRI | Ajouter stage')

@section('header_page')

      <h1>
        Membres
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('membres')}}">Membres</a></li>
        <li class="active">Nouveau</li>
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
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-xs-12">

            <form class="well form-horizontal" method="POST" action="{{url('stages/'.$membre->id)}}" id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden"  value="{{$membre->id}}" name="user_id">
              <fieldset>
         
                <!-- Form Name -->
                <legend><center><h2><b>Nouveau Stage</b></h2></center></legend><br>

                <!-- Text input-->
                   

                      <div class="form-group ">
                        <label class="col-xs-3 control-label">Titre</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('title')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="title" class="form-control" placeholder="Intitulé" type="text" value="{{old('title')}}">
                            <span class="help-block">
                                @if($errors->get('title'))
                                  @foreach($errors->get('title') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div>  


                      
                      
                      <div class="form-group ">
                        <label class="col-xs-3 control-label">Mois</label>  

                        <div class="col-xs-9 inputGroupContainer @if($errors->get('mois')) has-error @endif">
                          <div style="width: 70%">
                           <select name="mois" class="form-control selectpicker">
                              <option>{{old('mois')}}</option>
                              <option>Jan</option>
                              <option>Feb </option>
                              <option>Mar</option>
                              <option>Apr</option>
                              <option>May</option>
                              <option>Jun</option>
                              <option>Jul</option>
                              <option>Aug</option>
                              <option>Sep</option>
                              <option>Oct</option>
                              <option>Nov</option>
                              <option>Dec</option>  
                                  </select>
                            <span class="help-block">
                                @if($errors->get('mois'))
                                  @foreach($errors->get('mois') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div> 

  

                     

                       <div class="form-group">
                        <label class="col-md-3 control-label">Date début</label>  
                          <div class="col-md-9 inputGroupContainer @if($errors->get('start_date')) has-error @endif">
                            <div style="width: 70%">
                               
                                <input name="start_date" type="Date" class="form-control"  value="{{old('start_date')}}" >
                            </div>
                            <span class="help-block">
                                @if($errors->get('start_date'))
                                  @foreach($errors->get('start_date') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                      </div>

                       <div class="form-group">
                        <label class="col-md-3 control-label">Date fin</label>  
                          <div class="col-md-9 inputGroupContainer @if($errors->get('end_date')) has-error @endif">
                            <div style="width: 70%">
                               
                                <input name="end_date" type="Date" class="form-control"  value="{{old('end_date')}}" >
                            </div>
                            <span class="help-block">
                                @if($errors->get('end_date'))
                                  @foreach($errors->get('end_date') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                      </div>

                       <div class="form-group ">
                        <label class="col-xs-3 control-label">Contact partenaire</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('contact_id')) has-error @endif">
                          <div style="width: 70%">
                            <select name="contact_id" class="form-control select2" value="{{old('contact_id')}}">
                              <option></option>
                               @foreach($contacts as $contact)
                              <option value="{{$contact->id}}">{{$contact->nom}} {{$contact->prenom}}</option>
                               @endforeach
                            </select>
                            <span class="help-block">
                                @if($errors->get('contact_id'))
                                  @foreach($errors->get('contact_id') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div>  

                     
              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('membres')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>

  @endsection

  