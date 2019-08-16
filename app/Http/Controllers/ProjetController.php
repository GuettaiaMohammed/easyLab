<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\projetRequest;
use App\Projet;
use App\User;
use App\Contact;
use App\ContactProjet;
use App\Partenaire;
use App\ProjetUser;
use App\ProjetPartenaire;
use Auth;
use App\Parametre;
use Illuminate\Http\UploadedFile;

class ProjetController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

	//permet de lister les articles
    public function index(){
        $labo =  Parametre::find('1');
    	$projets = Projet::all();
        $contacts = Contact::all();
        $contactProjet = ContactProjet::all();
        
    	return view('projet.index')->with([
            'projets' => $projets ,
            'labo'=>$labo,
            'contacts'=>$contacts,
            'contactProjet'=>$contactProjet,
        ]);;
    	
    }
   

     public function part($id){
        $projet = Projet::find($id);
       $labo =  Parametre::find('1');

        return view('projet.partenaire' , ['projets' => $projets] ,['labo'=>$labo],['partenaires'=>$partenaires]);
        
    }

   

    public function details($id)
    {
        $labo =  Parametre::find('1');
        $projet = Projet::find($id);
        $membres = Projet::find($id)->users()->orderBy('name')->get();
        $contacts = Contact::all();
        $contactProjet = ContactProjet::all();

        return view('projet.details')->with([
            'projet' => $projet,
            'membres'=>$membres,
             'contacts'=>$contacts,
            'contactProjet'=>$contactProjet,
            'labo'=>$labo,
        ]);;
    } 

    //affichage de formulaire de creation d'articles
	 public function create()
     {
        $labo =  Parametre::find('1');
        if( Auth::user()->role->nom == 'admin')
            {
             $partenaires = Partenaire::all();
              $contacts = Contact::all();
    	 	 $membres = User::all();
             $projet = Projet::all();
    return view('projet.create')->with([
        'membres' =>$membres, 
        'labo'=>$labo,
        'partenaires' =>$partenaires,
        'contacts' => $contacts,
    ]);;
            }
             else{
                return view('errors.403',['labo'=>$labo]);
            }
    }


	 public function store(projetRequest $request){

	 	$projet = new Projet();
        $labo =  Parametre::find('1');

	 	if($request->hasFile('detail')){

            $file = $request->file('detail');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/projet'),$file_name);
            $projet->detail = '/uploads/projet/'.$file_name;
        }

	 	$projet->intitule = $request->input('intitule');
	 	$projet->resume = $request->input('resume');
    
	 	$projet->type = $request->input('type');
	 	$projet->lien = $request->input('lien');
        $projet->chef_id = $request->input('chef_id');
	 	
	 	$projet->save();

        $members =  $request->input('membre');
        foreach ($members as $key => $value) {
            $projet_user = new ProjetUser();
            $projet_user->projet_id = $projet->id;
            $projet_user->user_id = $value;
            $projet_user->save();

         } 

         $partenaires =  $request->input('partenaire');
        foreach ($partenaires as $key => $value) {
            $partenaire_projet = new ProjetPartenaire();
            $partenaire_projet->projet_id = $projet->id;
            $partenaire_projet->partenaire_id = $value;
            $partenaire_projet->save();

         } 


         $contacts =  $request->input('contact');
        foreach ($contacts as $key => $value) {
            $contact_projet = new ContactProjet();
            $contact_projet->projet_id = $projet->id;
            $contact_projet->contact_id = $value;
            $contact_projet->save();

         } 
      
      

	 	return redirect('projets');


	 }

    //récuperer un projet puis le mettre dans le formulaire
	 public function edit($id){

	 	 $projet = Projet::find($id);
	 	 $membres = User::all();
         $contacts = Contact::all();
         $contactProjet = ContactProjet::all();
         $labo =  Parametre::find('1');

         $this->authorize('update', $projet);

	 	return view('projet.edit')->with([
            'projet' => $projet,
            'membres' => $membres,
            'contacts' => $contacts,
            'contactProjet'=>$contactProjet,
            'labo'=>$labo,
        ]);;
	 	
    }

    //modifier et inserer
    public function update(projetRequest $request , $id){
    
    	$projet = Projet::find($id);
        $labo =  Parametre::find('1');

    	if($request->hasFile('detail')){

            $file = $request->file('detail');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/projet'),$file_name);
	 	     $projet->detail = '/uploads/projet/'.$file_name;

        }

        $projet->intitule = $request->input('intitule');
        $projet->resume = $request->input('resume');
        $projet->type = $request->input('type');
        $projet->lien = $request->input('lien');
        $projet->chef_id = $request->input('chef_id');

	 	$projet->save();

        $members =  $request->input('membre');

        $projet_user = ProjetUser::where('projet_id',$id);
        $projet_user->delete();

        foreach ($members as $key => $value) {
            $projet_user = new ProjetUser();
            $projet_user->projet_id = $projet->id;
            $projet_user->user_id = $value;
            $projet_user->save();

         } 
        $contacts =  $request->input('contacts');
         foreach ($contacts as $key => $value) {
            $contacts_projet = new ContactProjet();
            $contacts_projet->projet_id = $projet->id;
            $contacts_projet->contact_id = $value;
            $contacts_projet->save();

         } 


	 	return redirect('projets');

    }
    //supprimer un article
    public function destroy($id){

    	$projet = Projet::find($id);

        $this->authorize('delete', $projet);

        $projet->delete();
        return redirect('projets');

    }

      public function indexF(){
        $projets = Projet::all();
       

        return view('frontO.projets' , ['projets' => $projets] );
        
    }
     

    public function detailsF($id)
    {

        $projet = Projet::find($id);
        $membres = Projet::find($id)->users()->orderBy('name')->get();

        return view('frontO.details_projets')->with([
            'projet' => $projet,
            'membres'=>$membres,

        ]);;
    }

}
