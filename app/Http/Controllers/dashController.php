<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\DB;
use App\Statistique;
use Illuminate\Http\Request;
use Khill\Lavacharts\Laravel\LavachartsFacade as Lava;
use App\User;
use App\Parametre;

class dashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {  

        $labo = Parametre::find('1');
    // $membres = User::get()->cont();    
    // $membres = User::select(DB::raw('count(DISTINCT name) as name_count'))->get(); 
    $membres = DB::table('users')->distinct('id')->count();
    $equipes = DB::table('equipes')->distinct('id')->count();
    $articles = DB::table('articles')->distinct('id')->count();
    $theses = DB::table('theses')->distinct('id')->where('date_soutenance',null)->count();

    $lava=New Lava; 

$stat_article = $lava::DataTable();

$total_article= DB::table('articles')->distinct('id')->count();
$poster = DB::table('articles')->where('type', 'Poster')->count();
$p_poster = $poster*100/$total_article;
$livre = DB::table('articles')->where('type', 'Livre')->count();
$p_livre = $livre*100/$total_article;
$article_court = DB::table('articles')->where('type', 'Article court')->count();
$p_article_c = $article_court*100/$total_article;
$article_long = DB::table('articles')->where('type', 'Article long')->count();
$p_article_l = $article_long*100/$total_article;
$pub = DB::table('articles')->where('type', 'Publication(Revue)')->count();
$p_pub = $pub*100/$total_article;
$chapitre = DB::table('articles')->where('type', 'Chapitre d un livre')->count();
$p_chapitre = $chapitre*100/$total_article;
$brevet = DB::table('articles')->where('type', 'Brevet')->count();
$p_brevet = $brevet*100/$total_article;

$stat_article->addStringColumn('Catégories')
        ->addNumberColumn('Percent')
        ->addRow(['Poster', $p_poster])
        ->addRow(['Livre', $p_livre])
        ->addRow(['Article court', $p_article_c])
        ->addRow(['Article long', $p_article_l])
        ->addRow(['Publication(Revue)', $p_pub])
        ->addRow(['Chapitre d un livre', $p_chapitre])
        ->addRow(['Brevet', $p_brevet]);
       

$lava::PieChart('Statistique_article', $stat_article, [
    'title'  => 'Articles publiés',
     'titleTextStyle' => [
        'color'    => '#eb6b2c',
        'fontSize' => 14
    ],
    'is3D'   => true,
   'slices' => [
        ['offset' => 0.2],
        ['offset' => 0.25],
        ['offset' => 0.3]
    ]


]);


//select distinct(intitule),count(users.id) as nbr_membre from users,equipes where users.equipe_id = equipes.id group by intitule




        return view('dashboard')->with([
            "lava"=>$lava,
        	'membres' => $membres,
        	'equipes' => $equipes,
        	'articles' => $articles,
        	'theses' => $theses,
            'labo'=>$labo,
            
        ]);
    }

   


     
   
}
