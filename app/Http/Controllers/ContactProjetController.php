<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partenaire;
use App\Contact;
use App\Projet;
use App\ContactProjet;
use App\ProjetPartenaire;
use App\Article;
use App\ContactArticle;
use App\Parametre;
use Auth;

class ContactProjetController extends Controller
{
    public function addProjet($id){
        $labo =  Parametre::find('1');
        $projet = Projet::find($id);
        $partenaire = Partenaire::all();
        $contacts = Contact::all();

        return view('contact.addProjet')->with([
           'contacts' => $contacts,
           'partenaire' => $partenaire,
           'labo'=> $labo,
           'projet'=> $projet,
        ]);;
        
    }

      public function create($id)
     {
     	$projet = Projet::find($id);
        $labo =  Parametre::find('1');
        if( Auth::user()->role->nom == 'admin')
            {
             
    	 	 $partenaires = Partenaire::all();
             $contacts = Contact::all();
    	 	return view('contact.createContactProjet')->with([
             'partenaires' => $partenaires,
              'projet' => $projet,
             'labo'=>$labo,
         ]);;
            }
             else{
                return view('errors.403',['labo'=>$labo]);
            }
    }

     public function store(Request $request,$id){

	 	$projet = Projet::find($id);
        $contact = new Contact();
        $labo =  Parametre::find('1');

	 	

	 	$contact->nom = $request->input('nom');
	 	$contact->prenom = $request->input('prenom');
	 	$contact->fonction = $request->input('fonction');
	 	$contact->nature_cooperation = $request->input('nature_cooperation');
        $contact->email = $request->input('email');
	 	$contact->num_tel =$request->input('num_tel');
        $contact->partenaire_id = $request->input('partenaire');
	 	$contact->save();

        $contact_projet = new ContactProjet();
        $contact_projet->projet_id = $id;
        $contact_projet->contact_id = $contact->id;
        $contact_projet->save();    

        $partenaire_projet = new ProjetPartenaire();
        $partenaire_projet->projet_id = $request->input('projet_id'); 
        $partenaire_projet->partenaire_id = $request->input('partenaire'); 
        $partenaire_projet->save();

	 	return redirect('projets');


	 }


  public function add(Request $request ){
       
        $labo =  Parametre::find('1');
        $contact_projet = new ContactProjet();
        $contact_projet->contact_id =  $request->input('contact_id');
        $contact_projet->projet_id = $request->input('projet_id');     
        $contact_projet->save();
        $partenaire_projet = new ProjetPartenaire();
        $partenaire_projet->projet_id = $request->input('projet_id'); 
        $partenaire_projet->partenaire_id = $request->input('partenaire_id'); 
        $partenaire_projet->save();

       return redirect('projets');
        
    }

     public function destroy($id){

         
        $contact_projet = ContactProjet::find($id);

        $contact_projet->delete();
        return redirect('projets');

     }
}
