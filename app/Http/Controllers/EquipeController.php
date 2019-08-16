<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\equipeRequest;
use App\Parametre;
use App\Equipe;
use App\Projet;
use App\Materiel;
use App\Categorie;
use App\User;
use APP\ProjetUser;
use Auth;

class EquipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {  
    $labo = Parametre::find('1'); 
    $equipes = Equipe::all();
     // $nbr = DB::table('users')
     //            ->groupBy('equipe_id')
     //            ->count('equipe_id');

    $nbr = DB::table('users')
             ->select( DB::raw('count(*) as total,equipe_id'))
             ->groupBy('equipe_id')
             ->get();
 
        return view('equipe.index')->with([
            'equipes' => $equipes,
            'nbr' => $nbr,
            'labo'=>$labo,
        ]);;
    }
     

      
    public function create()
    {
        $labo = Parametre::find('1');
        if( Auth::user()->role->nom == 'admin')
            {
            	$membres = User::all(); 
                return view('equipe.create', ['membres' => $membres] ,['labo'=>$labo]);
            }
            else{
                return view('errors.403' ,['labo'=>$labo]);
            }
    }

    public function details($id)
    {
        $labo = Parametre::find('1');
        $equipe = Equipe::find($id);
        $membres = User::where('equipe_id', $id)->get();
        $materiels = DB::select('SELECT categories.nom 
            FROM categories,materiels
            WHERE  materiels.equipe_id= ? AND materiels.categorie_id=categories.id ',
            [$id]);

        return view('equipe.details')->with([
            'equipe' => $equipe,
            'membres' => $membres,
            'labo'=>$labo,
            'materiels'=> $materiels
        ]);
    } 

    public function store(equipeRequest $request)
    {
        $labo = Parametre::find('1');
        $equipe = new equipe();
        
        if($request->hasFile('photo')){

            $file = $request->file('photo');

            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);
            $equipe->photo = '/uploads/photo/'.$file_name;

        }
        $equipe->intitule = $request->input('intitule');
        $equipe->resume = $request->input('resume');
        $equipe->achronymes = $request->input('achronymes');
        $equipe->axes_recherche = $request->input('axes_recherche');
        $equipe->chef_id = $request->input('chef_id');

        $equipe->save();

        return redirect('equipes');

    }

    public function update(equipeRequest $request,$id)
    {
        $labo = Parametre::find('1');
        $equipe = Equipe::find($id);

        if( Auth::user()->role->nom == 'admin')
            {

            if($request->hasFile('photo')){

            $file = $request->file('photo');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

           $equipe->photo = '/uploads/photo/'.$file_name;

        }
        

            $equipe->intitule = $request->input('intitule');
            $equipe->resume = $request->input('resume');
            $equipe->achronymes = $request->input('achronymes');
            $equipe->axes_recherche = $request->input('axes_recherche');
            $equipe->chef_id = $request->input('chef_id');

            $equipe->save();

            return redirect('equipes/'.$id.'/details');
            }   
        else{
                return view('errors.403',['labo'=>$labo]);
            }

    }

    public function destroy($id)
    {
        if( Auth::user()->role->nom == 'admin')
            {
        $equipe = Equipe::find($id);
        $equipe->delete();
        return redirect('equipes');
        }
    }

        public function indexF(){
    
        $equipes = Equipe::all();
        return view('frontO.equipes', ['equipes'=> $equipes]);
    }
    public function detailsF($id)
    {
        $labo = Parametre::find('1');
        $equipe = Equipe::find($id);
        $membres = User::where('equipe_id', $id)->get();
        $projets = Projet::all();
        

        return view('frontO.details_equipe')->with([
            'equipe' => $equipe,
            'membres' => $membres,
            'projets'=>$projets,
            'labo'=>$labo,
        ]);
    } 

}
