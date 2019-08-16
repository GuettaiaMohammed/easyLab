<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use Auth;
use App\Parametre;
use App\Materiel;
use App\User;
use App\Equipe;

class CategorieController extends Controller
{
    public function create(){
    	$labo = Parametre::find('1');
    	return view('categorie.create' , ['labo' => $labo]);
    }

    public function store(Request $request){

    	$categorie = new Categorie();
    	$labo = Parametre::find('1');   	
    	$membres = User::all();
        $equipes = Equipe::all();
        $categories = Categorie::all();

    	$categorie->nom = $request->input('nom');

    	$categorie->save();

    	return redirect()->action('MaterielController@create');

    }
}
