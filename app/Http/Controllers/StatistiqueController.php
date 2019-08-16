<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Illuminate\support\Facades\DB;
use App\Statistique;
class StatistiqueController extends Controller
{

     public function index()
    {
    $lava = new Lavacharts; 

$stat = $lava->DataTable();

$total= DB::table('articles')->distinct('id')->count();
$poster = DB::table('articles')->where('type', 'Poster')->count();
$p_poster = $poster*100/$total;
$livre = DB::table('articles')->where('type', 'Livre')->count();
$p_livre = $livre*100/$total;
$article_court = DB::table('articles')->where('type', 'Article court')->count();
$p_article_c = $article_court*100/$total;
$article_long = DB::table('articles')->where('type', 'Article long')->count();
$p_article_l = $article_long*100/$total;
$pub = DB::table('articles')->where('type', 'Publication(Revue)')->count();
$p_pub = $pub*100/$total;
$chapitre = DB::table('articles')->where('type', 'Chapitre d un livre')->count();
$p_chapitre = $chapitre*100/$total;
$brevet = DB::table('articles')->where('type', 'Brevet')->count();
$p_brevet = $brevet*100/$total;

$stat->addStringColumn('Catégories')
        ->addNumberColumn('Percent')
        ->addRow(['Poster', $p_poster])
        ->addRow(['Livre', $p_livre])
        ->addRow(['Article court', $p_article_c])
        ->addRow(['Article long', $p_article_l])
        ->addRow(['Publication(Revue)', $p_pub])
        ->addRow(['Chapitre d un livre', $p_chapitre])
        ->addRow(['Brevet', $p_brevet]);
       

$lava->PieChart('Statistique', $stat, [
    'title'  => 'Articles publiés',
    'is3D'   => true,
   'slices' => [
        ['offset' => 0.2],
        ['offset' => 0.25],
        ['offset' => 0.3]
    ]


]);
    
    return view('dashboard',["lava"=>$lava]);
}    

}
