@extends('layouts.master')

@section('title','LRI | Liste des materiels')

@section('header_page')

	<h1>
        Materiels
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('materiels')}}">Materiels</a></li>
    </ol>

@endsection

@section('asidebar')

<li>
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
        <li class=" active">
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
        <div class="box col-xs-12">
          <div class="container" style="padding-top: 30px">
          <div class="row" style="padding-bottom: 20px">
            <div class="box-header col-xs-9">
              <h3 class="box-title">Liste des materiels</h3>

             
            </div>
          </div>
          </div>
            
            <!-- /.box-header -->
            <div class="box-body">
            @if(Auth::user()->role->nom != 'membre' )
              <div class=" pull-right">
                <a href="{{url('materiels/create')}}" type="button" class="btn btn-block btn-success btn-lg">
                	<i class="fa fa-plus"></i> Nouveau materiel</a>
              </div>
            @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Numéro</th>
                  <th>Categorie</th>
                  <th>Libellé</th>
                  <th>Affecté à</th>
                  <th>Date affectaion</th>
                  <th>Actions</th>
                  
                </tr>
                </thead>
                <tbody>

                  @foreach($materiels as $materiel)
                  <tr>
                    <td>{{ $materiel->numero}}</td>
                    <td>{{ $materiel->categorie->nom}}</td>
                    <td>{{ $materiel->libelle }}</td>
                    <td>
                      @if($materiel->user_id)
                      <a href="{{url('membres/'.$materiel->user->id.'/details')}}"> {{ $materiel->user->name }} {{ $materiel->user->prenom }} </a>
                      @endif
                      @if($materiel->equipe_id)
                      <a href="{{url('equipes/'.$materiel->equipe->id.'/details')}}"> {{ $materiel->equipe->intitule }}</a>
                      @endif
                    </td>
                    <td> {{ $materiel->affected_at }} </td>
                    
                     <td>


                      <form action="{{ url('materiels/'.$materiel->id)}}" method="post"> 

                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      
                      @if(Auth::user()->role->nom != 'membre' )
                      <a href="{{ url('materiels/'.$materiel->id.'/edit')}}" class="btn btn-default">
                        <i class="fa fa-edit"></i>
                      </a>
                      @endif
                      @if(Auth::user()->role->nom != 'membre' )
                      <!-- <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                      </button> -->
                       <a href="#supprimer{{ $materiel->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $materiel->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $materiel->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $materiel->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ? 
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('materiels/'.$materiel->id)}}"  method="POST">
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
                      </form>

                    <!-- Store Pour Chef -->
                     @if(Auth::user()->role->nom == 'membre' &&  $materiel->user_id==NULL && $materiel->equipe_id==NULL)
                      @foreach($equipes as $equipe)
                      @if(Auth::user()->id == $equipe->chef_id && $equipe->id == Auth::user()->equipe_id)
                      <a href="#storeFor{{ $materiel->id }}Modal" role="button" class="btn btn-warning" data-toggle="modal">Réservé </a>

                      <div class="modal fade" id="storeFor{{ $materiel->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="storeFor{{ $materiel->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                    <form action=" {{url('materiels/'.$materiel->id )}} " method="post">
                                      <input type="hidden" name="_method" value="PUT">

                                        {{ csrf_field() }}
                                        <input  name="numero" value="{{ $materiel -> numero}}" type="hidden">
                                        <input  name="categorie" value="{{ $materiel->categorie->id }}" type="hidden">
                                        <input  name="libelle" value="{{ $materiel -> libelle}}" type="hidden">
                                        <input  name="membre" value="{{ Auth::user()->id }}" type="hidden">
                                        <input  name="equipe" value="{{ Auth::user()->equipe->id }}" type="hidden">
                                        <input  name="dateAffectation" value="{{ date('Y-m-d') }}" type="hidden">

                                          <input type="submit" name="storeForMe" class="btn btn-light pull-left" value="Réservé pour moi">
                                          <input type="submit" name="storeForEquipe" class="btn btn-warning pull-right" value="Réservé pour l'équipe">
                                      </form>
                                  </div>
                                  <div class="modal-footer">
                                     
                                  </div>
                              </div>
                          </div>
                      </div>
                        @endif
                      @endforeach
                    @endif

                    <!-- Store Pour User -->
                    @if(Auth::user()->role->nom == 'membre' && Auth::user()->id != 22  && $materiel->user_id==NULL && $materiel->equipe_id==NULL)
                    <form action=" {{url('materiels/'.$materiel->id )}} " method="post">
                      <input type="hidden" name="_method" value="PUT">

                        {{ csrf_field() }}
                      <input  name="numero" value="{{ $materiel -> numero}}" type="hidden">
                      <input  name="categorie" value="{{ $materiel->categorie->id }}" type="hidden">
                      <input  name="libelle" value="{{ $materiel -> libelle}}" type="hidden">
                      <input  name="membre" value="{{ Auth::user()->id }}" type="hidden">
                      <input  name="dateAffectation" value="{{ date('Y-m-d') }}" type="hidden">

                      <input type="submit" name="storeForMe" class="btn btn-warning" value="Réservé">
                        
                      </input>
                      
                    </form>
                    @endif


                    <!-- Rendre pour Equipe -->
                    @if(Auth::user()->role->nom == 'membre' && $materiel->user_id == Auth::user()->id || $materiel->equipe_id == Auth::user()->equipe_id)
                     @foreach($equipes as $equipe)
                      @if(Auth::user()->id == $equipe->chef_id && $equipe->id == Auth::user()->equipe_id)
                    <form action=" {{url('materielsRendre/'.$materiel->id )}} " method="post">
                      <input type="hidden" name="_method" value="PUT">

                        {{ csrf_field() }}
                      <input  name="numero" value="{{ $materiel -> numero}}" type="hidden">
                      <input  name="categorie" value="{{ $materiel->categorie->id }}" type="hidden">
                      <input  name="libelle" value="{{ $materiel -> libelle}}" type="hidden">
                      

                      <button type="submit" class="btn btn-danger">
                        &nbsp;Rendre 
                      </button>
                      
                    </form>
                    @endif
                    @endforeach
                    @endif

                  
                    <!--Rendre pour User -->
                    @if(Auth::user()->role->nom == 'membre' && Auth::user()->id != 22 && $materiel->user_id == Auth::user()->id)
                    <form action=" {{url('materielsRendre/'.$materiel->id )}} " method="post">
                      <input type="hidden" name="_method" value="PUT">

                        {{ csrf_field() }}
                      <input  name="numero" value="{{ $materiel -> numero}}" type="hidden">
                      <input  name="categorie" value="{{ $materiel->categorie->id }}" type="hidden">
                      <input  name="libelle" value="{{ $materiel -> libelle}}" type="hidden">
                      

                      <button type="submit" class="btn btn-danger">
                        &nbsp;Rendre 
                      </button>
                      
                    </form>
                    @endif

                    </div>
                    </td>

   

                  </tr>
                  @endforeach

                  


                </tbody>
                <tfoot>
                 <tr>
                  <th>Numéro</th>
                  <th>Categorie</th>
                  <th>Libellé</th>
                  <th>Affecté à</th>
                  <th>Date affectaion</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        
      </div>
      
    </div>
    
  @endsection