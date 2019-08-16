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
use App\ContactUser;
use App\Parametre;
use Auth;

class ContactController extends Controller
{
    



     public function create()
     {
        $labo =  Parametre::find('1');
        if( Auth::user()->role->nom == 'admin')
            {
             
             $partenaires = Partenaire::all();
             $contacts = Contact::all();
            return view('contact.createContactProjet')->with([
             'partenaires' => $partenaires,
             'labo'=>$labo,
         ]);;
            }
             else{
                return view('errors.403',['labo'=>$labo]);
            }
    }

     public function store(Request $request){

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

        return redirect()->action('ProjetController@create');


     }

 


      public function edit($id){

         $contact = Contact::find($id);
         $partenaires = Partenaire::all(); 
         $labo =  Parametre::find('1');
         
        return view('contact.edit')->with([
             'contact' => $contact,
            'partenaires' => $partenaires,
            'labo'=>$labo,
            
        ]);;
        
    }


      public function update(Request $request , $id){
    
        $contact = Contact::find($id);
        $labo =  Parametre::find('1');
        

        $contact->nom = $request->input('nom');
        $contact->prenom = $request->input('prenom');
        $contact->fonction = $request->input('fonction');
        $contact->partenaire_id = $request->input('partenaire_id');
        $contact->nature_cooperation = $request->input('nature_cooperation');
        $contact->email = $request->input('email');
        $contact->num_tel = $request->input('num_tel'); 


        $contact->save();
        return redirect('partenaires');

    }

        public function destroy(Request $request , $id){

        $contact = Contact::find($id);

        $contact->delete();
        return redirect('partenaires');

     }
}
