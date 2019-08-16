@extends('layouts.master')

@section('title','LRI | Liste des contacts')

@section('header_page')

      <h1>
         Contacts
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="fa fa-dashboard"><a href="{{url('contacts')}}">Contacts</a></li>
      
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

        <li>
          <a href="{{url('partenaires')}}">
            <i class="fa fa-building-o"></i> 
            <span>Partenaires</span>
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
              <h3 class="box-title">Liste des Contacts</h3>
            </div>
          </div>
          </div>
            
            <!-- /.box-header -->
            <div class="box-body">
           
              <div class="pull-right">
                <a href="{{url('contacts/'.$projet->id.'/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"> Créer Contact</i></a>
              </div>
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Organisme</th>
                  <th>Fonction</th>
                  <th>Nature de coopération</th>
                 
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($contacts as $contact)
                  <tr>
                    <td>{{$contact->nom}}</td>
                    <td>{{$contact->prenom}}</td>
                    <td>{{$contact->partenaire->nom}}</td>
                    <td>{{$contact->fonction}}</td>
                    <td>{{$contact->nature_cooperation}}</td>
                    
                   
                   
                   <td>
                      <div class="btn-group">
                        <form action="{{ url('contacts')}}" method="post">

                          <input type="hidden" name="_method" value="PUT">
                         {{ csrf_field() }}
                        <input type="hidden"  value="{{$contact->id}}" name="contact_id">
                        <input type="hidden"  value="{{$projet->id}}" name="projet_id">
                        <input type="hidden"  value="{{$contact->partenaire->id}}" name="partenaire_id">
                          
                        <button class="btn btn-info"><i class="fa fa-plus"></i> </button> 
                        
                        </form>
                    </div>
                    </td>
                  </tr>
                  @endforeach
                  
                 </tbody>
                <tfoot>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Organisme</th>
                  <th>Fonction</th>
                  <th>Nature de coopération</th>
                 
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