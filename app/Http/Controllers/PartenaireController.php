<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parametre;
use App\Partenaire;
use App\Contact;
use App\ProjetPartenaire;
use Auth;

class PartenaireController extends Controller
{

      public function index(){
        $labo =  Parametre::find('1');
    	$partenaires = Partenaire::all();

    	return view('partenaire.index' , ['partenaires' => $partenaires] ,['labo'=>$labo]);
    	
    }

      public function details($id)
    {
        $partenaire = Partenaire::find($id);
        $labo = Parametre::find('1');
        
        $contacts = Contact::where('partenaire_id', $id)->get();

        return view('partenaire.details')->with([
            'partenaire' => $partenaire,
            'contacts' => $contacts,
            'labo'=>$labo,
            
        ]);;
    }

    	 public function create()
     {
        $labo =  Parametre::find('1');
        if( Auth::user()->role->nom == 'admin')
            {
    	 	
             $partenaires = Partenaire::all();
    	 	return view('partenaire.create', ['labo'=>$labo]);
            }
             else{
                return view('errors.403',['labo'=>$labo]);
            }
    }

	 public function store(Request $request){

	 	$partenaire = new Partenaire();
        $labo =  Parametre::find('1');

	 	if($request->hasFile('logo')){

            $file = $request->file('logo');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);
            $partenaire->logo = '/uploads/photo/'.$file_name;
        }

	 	$partenaire->nom = $request->input('nom');
	 	$partenaire->type = $request->input('type');
	 	$partenaire->pays = $request->input('pays');
	 	$partenaire->ville = $request->input('ville');

      
	 	
	 	$partenaire->save();

	 	return redirect('partenaires');


	 }
   	 public function edit($id){

	 	 $partenaire = Partenaire::find($id);
         $labo =  Parametre::find('1');
         
	 	return view('partenaire.edit')->with([
      
            'partenaire' => $partenaire,
            'labo'=>$labo,
        ]);;
	 	
    }

	  public function update(Request $request , $id){
    
    	$partenaire = Partenaire::find($id);
        $labo =  Parametre::find('1');
        

    	if($request->hasFile('logo')){

            $file = $request->file('logo');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);
	 	    $partenaire->logo = '/uploads/photo/'.$file_name;

        }

        $partenaire->nom = $request->input('nom');
        $partenaire->type = $request->input('type');
        $partenaire->pays = $request->input('pays');
        $partenaire->ville = $request->input('ville');

	 	$partenaire->save();
	 	return redirect('partenaires');

    }

     public function destroy(Request $request , $id){

     	$partenaire = Partenaire::find($id);

      

        $partenaire->delete();
        return redirect('partenaires');

     }
}
