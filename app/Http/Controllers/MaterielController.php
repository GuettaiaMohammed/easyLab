<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materiel;
use App\User;
use App\Equipe;
use App\Categorie;
use App\Parametre;
use App\Http\Requests\materielRequest;
use Auth;

class MaterielController extends Controller
{
    public function index(){
    	$labo = Parametre::find('1');
    	$listMateriel = Materiel::all();
        $equipes = Equipe::all();

    	return view('materiel.index')->with(['materiels' => $listMateriel ,
         'labo'=>$labo,
         'equipes'=>$equipes
         ]);
    }

    public function details(){

    }

    public function create(){
    	$labo = Parametre::find('1');
    	$membres = User::all();
        $equipes = Equipe::all();
        $categories = Categorie::all();
 
    	return view('materiel.create')->with([
        'membres' => $membres,
        'categories' => $categories,
        'labo'=>$labo,
        'equipes'=>$equipes
        ]);
    }
    
    public function store(materielRequest $request ){//materielRequest !!!!
    	$labo = Parametre::find('1');
        $equipes = Equipe::all();
        $membres = User::all();
    	$materiel = new Materiel();

    	$materiel->numero = $request->input('numero');
    	$materiel->libelle = $request->input('libelle');

        if ($request->input('membre')) {
            $materiel->user_id = $request->input('membre');
        }    
        if ($request->input('equipe')) {
            $materiel->equipe_id = $request->input('equipe');
        }  

        $materiel->categorie_id = $request->input('categorie');
    	$materiel->affected_at = $request->input('dateAffectation');

    	$materiel->save();
    	session()->flash('success','Le materiel a été bien ajouter');
    	return redirect('materiels');
    }

    public function storeAfterNot(Request $request , $id){
        $labo = Parametre::find('1');
        $membres = User::all();
        $materiel = Materiel::find($id);
        $equipes = Equipe::all();

        $materiel->numero = $request->input('numero');
        $materiel->libelle = $request->input('libelle');

        if ($request->input('storeForMe')) {
           $materiel->user_id = $request->input('membre');
        }
         if ($request->input('storeForEquipe')) {
           $materiel->equipe_id = $request->input('equipe');
        }
        
        
        $materiel->categorie_id = $request->input('categorie');
        $materiel->affected_at = $request->input('dateAffectation');

        $materiel->save();
        session()->flash('success','Le materiel a été bien ajouter');
        return redirect('materiels');
        
       
    }

    public function rendre(Request $request , $id){
        $labo = Parametre::find('1');
        $membres = User::all();
        $materiel = Materiel::find($id);
        $equipes = Equipe::all();

        $materiel->numero = $request->input('numero');
        $materiel->libelle = $request->input('libelle'); 
        $materiel->categorie_id = $request->input('categorie');
        $materiel->user_id = NULL;
        $materiel->equipe_id = NULL;
        $materiel->affected_at = NULL;

        $materiel->save();
        session()->flash('success','Le materiel a été bien ajouter');
        return redirect('materiels');
        
       
    }

    public function edit($id){
    	$materiel = Materiel::find($id);
    	$membres = User::all();
        $categories = Categorie::all();
    	$labo = Parametre::find('1');
         $equipes = Equipe::all();


    	return view('materiel.edit')->with([
    		'materiel' => $materiel ,
    	 	'membres' => $membres,
    	 	'labo'=>$labo,
            'categories'=>$categories,
            'equipes'=>$equipes
    	 ]);
    }

    public function update(materielRequest $request , $id){
    	$labo = Parametre::find('1');
    	$materiel = Materiel::find($id);

    	$materiel->numero = $request->input('numero');
        $materiel->libelle = $request->input('libelle');
        
        if ($request->input('membre')) {
            $materiel->user_id = $request->input('membre');
        }    
        if ($request->input('equipe')) {
            $materiel->equipe_id = $request->input('equipe');
        }  
       
        $materiel->categorie_id = $request->input('categorie');
        $materiel->affected_at = $request->input('dateAffectation');

    	$materiel->save();
    	return redirect('materiels');

    }

    public function destroy($id){
    	$materiel = Materiel::find($id);

    	$materiel->delete();
    	return redirect('materiels');

    }


}
