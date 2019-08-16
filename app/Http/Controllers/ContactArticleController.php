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
class ContactArticleController extends Controller
{
     public function addArticle($id){
        $labo =  Parametre::find('1');
        $article = Article::find($id);
        $partenaire = Partenaire::all();
        $contactts = Contact::all();

        return view('contact.addArticle')->with([
           'contactts' => $contactts,
           'partenaire' => $partenaire,
           'labo'=> $labo,
           'article'=> $article,
        ]);;
        
    }

     public function create($id)
     {
     	$article = Article::find($id);
        $labo =  Parametre::find('1');
        if( Auth::user()->role->nom == 'admin')
            {
             
    	 	 $partenaires = Partenaire::all();
             $contacts = Contact::all();
    	 	return view('contact.create2')->with([
             'partenaires' => $partenaires,
              'article' => $article,
             'labo'=>$labo,
         ]);;
            }
             else{
                return view('errors.403',['labo'=>$labo]);
            }
    }

     public function store(Request $request,$id){

	 	$article = Article::find($id);
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

        $contact_article = new ContactArticle();
        $contact_article->article_id = $id;
        $contact_article->contact_id = $contact->id;
        $contact_article->save();    

        
	 	return redirect('articles');


	 }

	   public function add(Request $request ){
       
        $labo =  Parametre::find('1');
        $contact_article = new ContactArticle();
        $contact_article->contact_id =  $request->input('contact_id');
        $contact_article->article_id = $request->input('article_id');     
        $contact_article->save();
       

       return redirect('articles');
        
    }

     public function destroy( $id){

        
        $contact_article = ContactArticle::find($id);
        
        $contact_article->delete();
        return redirect('articles');

     }


}
