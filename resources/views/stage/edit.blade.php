@extends('layouts.master')

@section('title','LRI | edit stage')

@section('header_page')

      <h1>
        Stages
        <small>Modifier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        
        <li class="active">Modifier</li>
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
            <li ><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
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

       
        <li >
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
     
  <div class="row" style="padding-top: 30px">
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-xs-12">

            <form class="well form-horizontal" action="{{url('stages/'.$stage->id)}} " method="post"  id="contact_form" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}
              <input type="hidden" name="contact_id" value="{{$stage->contact_id}}">
              <input type="hidden" name="user_id" value="{{$stage->user_id}}">
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Modifier stage</b></h2></center></legend><br>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Titre</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="title" class="form-control" value="{{ $stage -> title}}" type="text">
                          </div>
                        </div>
                  </div>  

                  
               

                   <div class="form-group ">
                        <label class="col-xs-3 control-label">Mois</label>  

                        <div class="col-xs-9 inputGroupContainer ">
                          <div style="width: 70%">
                            <select name='mois' class="form-control select" >
                              <option>{{$stage->mois}}</option>
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
                           
                          </div>
                        </div>
                  </div> 

                  

                <div class="form-group ">
                        <label class="col-xs-3 control-label">Date début</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="start_date" class="form-control" value="{{ $stage -> start_date}}" type="Date">
                          </div>
                        </div>
                  </div> 

                   <div class="form-group ">
                        <label class="col-xs-3 control-label">Date fin</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="end_date" class="form-control" value="{{ $stage -> end_date}}" type="Date">
                          </div>
                        </div>
                  </div>     
    
                  <div class="form-group"> 
                          <label class="col-md-3 control-label">Contact</label>
                            <div class="col-md-9 selectContainer ">
                              <div class="input-group"  style="width: 70%">
                                  <select name="contact_id" class="form-control selectpicker">
                          
                                    @foreach($contacts as $contact)
                                    @if($stage->contact_id==$contact->id)
                                    <option value=" {{$contact->id}}">{{$contact->nom}} {{$contact->prenom}}</option>
                                    @endif
                                  
                                    @endforeach
                                     @foreach($contacts as $contact)
                                   <option value="{{$contact->id}}">{{$contact->nom}}   {{$contact->prenom}}</option>
                                    @endforeach
                                  </select>
                                 
                              </div>
                            </div>
                      </div>
            

              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <button type="submit" href="" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</button>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>
    
  @endsection