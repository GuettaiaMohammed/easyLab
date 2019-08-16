<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Actualite;
use App\User;
use App\ActualiteUser;
use App\Parametre;
use Auth;

class ActualiteController extends Controller
{
        public function index(){

    	$labo = Parametre::find('1');
    	$listactualite = Actualite::all();
    	return view('actualite.index' , ['actualites' => $listactualite] ,['labo'=>$labo]);

    }

    	 public function create()
	 {
	 	$labo = Parametre::find('1');
	 	
            {
	 	$membres = User::all();
	 	$actualite = Actualite::all();

	 	return view('actualite.create',['membres'=>$membres],['labo'=>$labo]);
			 }
           

    }

     public function store(Request $request){

	 	$actualite = new Actualite();
	 	$labo = Parametre::find('1');

	 	if($request->hasFile('photo')){

            $file = $request->file('photo');

            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);
            $actualite->photo = '/uploads/photo/'.$file_name;

        }

	 
	 	$actualite->titre = $request->input('titre');
	 	$actualite->resume = $request->input('resume');
	 	$actualite->texte = $request->input('texte');
	 	$actualite->date_publication = $request->input('date_pulication');
	 	$actualite->deposer = Auth::user()->id;
	 	$actualite->save();

	 	   $members =  $request->input('membre');
            foreach ($members as $key => $value) {
	 		$actualite_user = new ActualiteUser();
		 	$actualite_user->actualite_id = $actualite->id;
		 	$actualite_user->user_id = $value;
	 	    $actualite_user->save();

         } 
	 	
	 	
	 	$actualite->save();

       

	 	return redirect('actualites');


    }


   public function edit($id){

	 	$actualite = Actualite::find($id);
	 	$membres = User::all();
	 	$labo = Parametre::find('1');

	 	return view('actualite.edit')->with([
	 		'actualite' => $actualite,
	 		'membres'=>$membres,
	 		'labo'=>$labo,
	 	]);;
    }

    public function update(Request $request ,$id){
    
    	$actualite = Actualite::find($id);
    	$labo = Parametre::find('1');

    	
	 	$actualite->titre = $request->input('titre');
	 	$actualite->resume = $request->input('resume');
	 	$actualite->texte = $request->input('texte');
	 	$actualite->date_publication = $request->input('date_publication');
	 	

	 	if($request->hasFile('photo')){

            $file = $request->file('photo');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

        $actualite->photo = '/uploads/photo/'.$file_name;

        }
	 	
	 	$actualite->save();

	 	$members =  $request->input('membre');
        $actualite_user = ActualiteUser::where('actualite_id',$id);
        $actualite_user->delete();
        
        foreach ($members as $key => $value) {
            $actualite_user = new ActualiteUser();
            $actualite_user->actualite_id = $actualite->id;
            $actualite_user->user_id = $value;
            $actualite_user->save();

         } 

	 	

	 	return redirect('actualites');
    }

     public function destroy($id){

    	$actualite = Actualite::find($id);


        $actualite->delete();
        return redirect('actualites');

    }

    public function acceuil(){

        
        $listactualite = DB::select('SELECT * FROM actualites ORDER BY date_publication DESC LIMIT 3 ');
        return view('frontO.index' , ['listactualite' => $listactualite]);

    }

   public function indexF(){

    	
    	$listactualite = Actualite::all();
    	return view('frontO.actualites' , ['actualitesF' => $listactualite]);

    }

    public function detailsF($id){

    	$labo = Parametre::find('1');
    	$listactualite = Actualite::find($id);
    	return view('frontO.details_actualite' , ['actualitesF' => $listactualite] ,['labo'=>$labo]);

    }

}
