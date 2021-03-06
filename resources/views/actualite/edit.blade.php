@extends('layouts.master')

@section('title','LRI | Modifier une actualité')

@section('header_page')
	<h1>
        Actualité
        <small>Modifier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('articles')}}">Actualités</a></li>
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


    <div class="row" style="padding-top: 30px">
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-xs-12">

            <form class="well form-horizontal" action=" {{url('actualites/'. $actualite->id) }}" method="post"  id="contact_form">
              <input type="hidden" name="_method" value="PUT">
            	{{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Modifier actualité</b></h2></center></legend><br>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Titre</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="titre" class="form-control" type="text" value="{{ $actualite->titre }}">
                          </div>
                        </div>
                  </div>  

                  <div class="form-group">
                      <label class="col-md-3 control-label">Résumé</label>
                      <div class="col-md-9 inputGroupContainer">
                        <div style="width: 70%">
                          <textarea name="resume" class="form-control" rows="3">{{ $actualite->resume }}</textarea>
                        </div>
                      </div>
                  </div>
               
                  <div class="form-group">
                      <label class="col-md-3 control-label">Texte</label>
                      <div class="col-md-9 inputGroupContainer">
                        <div style="width: 70%">
                          <textarea name="texte" class="form-control" rows="3">{{ $actualite->texte }}</textarea>
                        </div>
                      </div>
                  </div>
                 
                  <div class="form-group">
                    <label class="col-md-3 control-label">Membres</label>
                    <div class="col-md-9 inputGroupContainer">
                      <div style="width: 70%">
                        <select name="membre[]" class="form-control select2" multiple="multiple" data-placeholder="Selectionnez les Membres ">
                          <option>
                             @foreach ($actualite->users as $user) 
                              <option value="{{$user->id}}" selected>
                                  {{ $user->name }} {{ $user->prenom }}
                              </option>
                            @endforeach
                          </option>
                         @foreach($membres as $membre)
                              <option value="{{$membre->id}}">{{$membre->name}} {{$membre->prenom}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                       
                     <div class="form-group ">
                        <label class="col-xs-3 control-label">Date de publication</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="date_publication" class="form-control" type="Date" value="{{$actualite->date_pubication}}">
                          </div>
                        </div>
                  </div> 

                  <div class="form-group">
                      <label class="col-md-3 control-label">Photo</label>
                      <div class="col-md-9 inputGroupContainer">
                        <div style="width: 70%">
                          <input name="photo" type="file" id="exampleInputFile" value="{{asset('$actualite->photo')}}">
                        </div>
                      </div>
                  </div>
             
              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{ url('actualites')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>


@endsection