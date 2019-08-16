<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUser;
use App\Contact;
use App\User;
use App\Parametre;
use Auth;
class StageController extends Controller
{
    
     public function create($id)
	 {
	 
        $membre = User::find($id);
        $labo = Parametre::find('1');
        
            {
        $contacts = Contact::all();
        $stage = ContactUser::all();

        return view('stage.create')->with([
           'contacts' => $contacts,
           'stage' => $stage,
           'labo'=> $labo,
           'membre' => $membre,
           
        ]);;

        }
       
     }


public function store(Request $request,$id){

	    $membre = User::find($id);
      
        $labo =  Parametre::find('1');

          $contact_user = new ContactUser();

        $contact_user->title = $request->input('title');
        
        $contact_user->mois = $request->input('mois');
       
        $contact_user->start_date = $request->input('start_date');
        $contact_user->end_date =$request->input('end_date');
        $contact_user->contact_id = $request->input('contact_id');
        $contact_user->user_id = $request->input('user_id');
        $contact_user->save();

        return redirect('membres');
	 	

    }

    public function edit($id){

    	 $stage = ContactUser::find($id);
    	 $membre = User::all();
         $contacts = Contact::all();
         $labo =  Parametre::find('1');


	 	return view('stage.edit')->with([
            'stage' => $stage,
            'contacts' => $contacts,
            'labo'=>$labo,
            'membre' =>$membre,
        ]);;

    }

    public function update(Request $request ,$id){
         
         $stage = ContactUser::find($id);
         $labo =  Parametre::find('1');
         $stage->title = $request->input('title');
         
         $stage->mois = $request->input('mois');
    
         $stage->start_date = $request->input('start_date');
         $stage->end_date = $request->input('end_date');
         $stage->contact_id = $request->input('contact_id');
         $stage->user_id = $request->input('user_id');

          $stage->save();

          return redirect('membres');
    	}

    public function destroy(Request $request , $id){

         
        $contact_user = ContactUser::find($id);

        $contact_user->delete();
        return redirect('membres');

     }

}
