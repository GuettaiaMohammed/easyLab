<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Equipe;
use App\Article;
use App\Projet;
class chartsController extends Controller
{
    function article_equipe(){
                                    $equipes2=Equipe::all();
                                    $dates=Article::select('annee')->orderBy('annee','asc')->distinct()->get();
                                    //$date=date('Y');
                                    foreach ($equipes2 as $equipe) {
                                        foreach ($dates as $date ) {
                                            $equipes[$equipe->intitule][$date->annee]=DB::table('equipes')->select('equipes.intitule','articles.titre','articles.annee')
                                        ->distinct()
                                        ->where('articles.annee','=',$date->annee)
                                        ->where('equipes.intitule','=',$equipe->intitule)
                                        ->join('users','equipes.id','=','users.equipe_id')
                                        ->join('article_user','article_user.user_id','=','users.id')
                                        ->join('articles','article_user.article_id','=','articles.id')->get()->count();

                                        }
                                        
                                    }
                   
            $equipes['date']=$dates;
            return $equipes;
    }

    function projet_equipe(){
                                    $equipes2=Equipe::all();
                                    $dates=Projets::select('created_at')->orderBy('created_at','asc')->get();
                                    //$date=date('Y');
                                    foreach ($equipes2 as $equipe) {
                                        foreach ($dates as $date ) {
                                            $equipes[$equipe->intitule][$date->created_at]=DB::table('equipes')->select('equipes.intitule','projets.intitule','projets.created_at')
                                        ->distinct()
                                        ->where('projets.created_at','=',$date->created_at)
                                        ->where('equipes.intitule','=',$equipe->intitule)
                                        ->join('users','equipes.id','=','users.equipe_id')
                                        ->join('projet_user','projet_user.user_id','=','users.id')
                                        ->join('projets','projet_user.projet_id','=','projets.id')->get()->count();

                                        }
                                        
                                    }
                   
            $equipes['date']=$dates;
            return $equipes;
    }

    function article(){

    	  $articles1=Article::all();
    	  $artic =array();
 
                
          $artic []=DB::select('SELECT COUNT(*) as cmp,type FROM `articles` GROUP BY type');
                                       

                                                          
            return json_encode($artic);


    }

        function eff_equipe(){

    	  
    	  $equipe =array();
 
                
          $equipe []=DB::select('SELECT COUNT(users.id) as nbr , equipes.intitule FROM users,equipes WHERE users.equipe_id = equipes.id GROUP BY equipes.intitule');
                                       

                                                          
            return json_encode($equipe);


    }
}
