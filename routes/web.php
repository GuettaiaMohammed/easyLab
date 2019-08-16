<?php
use App\User;
use App\These;
use App\Projet;
use App\Article;
use App\Equipe;
use App\Parametre;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});










Route::get('/details',function(){
     return view('contact/details');
});


Route::get('charts', 'chartsController@article_equipe');
Route::get('charts2', 'chartsController@article');
Route::get('charts3', 'chartsController@eff_equipe');

Route::get('dashboard','dashController@index');


Route::get('parametre','ParametreController@create');
Route::post('parametre','ParametreController@store');

Route::get('theses','TheseController@index');
Route::get('theses/create','TheseController@create');
Route::post('theses','TheseController@store')->middleware('thesecond');
Route::get('theses/{id}/details','TheseController@details');
Route::get('theses/{id}/edit','TheseController@edit');
Route::put('theses/{id}','TheseController@update');
Route::delete('theses/{id}','TheseController@destroy');

Route::get('articles','ArticleController@index');
Route::get('articles/create','ArticleController@create');
Route::post('articles','ArticleController@store');
Route::get('articles/{id}/details','ArticleController@details');
Route::get('articles/{id}/edit','ArticleController@edit');
Route::put('articles/{id}','ArticleController@update');
Route::delete('articles/{id}','ArticleController@destroy');

Route::get('membres','UserController@index');
Route::get('membres/create','UserController@create');
Route::post('membres','UserController@store');
Route::get('membres/{id}/details','UserController@details');
Route::get('trombinoscope','UserController@trombi');
Route::get('membres/{id}/edit','UserController@edit');
Route::put('membres/{id}','UserController@update');
Route::delete('membres/{id}','UserController@destroy');


Route::get('test','EquipeController@index');
Route::get('equipes','EquipeController@index');
Route::get('equipes/create','EquipeController@create');
Route::post('equipes','EquipeController@store');
Route::get('equipes/{id}/details','EquipeController@details');
Route::put('equipes/{id}','EquipeController@update');
Route::delete('equipes/{id}','EquipeController@destroy');

Route::get('projets','ProjetController@index');
Route::get('projets/create','ProjetController@create');
Route::post('projets','ProjetController@store');
Route::get('projets/{id}/details','ProjetController@details');
Route::get('projets/{id}/edit','ProjetController@edit');
Route::put('projets/{id}','ProjetController@update');
Route::delete('projets/{id}','ProjetController@destroy');

Route::get('partenaires','PartenaireController@index');
Route::get('partenaires/create','PartenaireController@create');
Route::post('partenaires','PartenaireController@store');
Route::get('partenaires/{id}/details','PartenaireController@details');
Route::get('partenaires/{id}/edit','PartenaireController@edit');
Route::put('partenaires/{id}','PartenaireController@update');
Route::delete('partenaires/{id}','PartenaireController@destroy');

Route::get('contacts/{id}/edit','ContactController@edit');
Route::put('contactes/{id}','ContactController@update');
Route::delete('contactes/{id}','ContactController@destroy');

//Route::get('contacts/{id}','ContactProjetController@addProjet');
Route::get('contacts/create','ContactController@create');
Route::post('contacts','ContactController@store');
Route::put('contacts','ContactProjetController@add');
Route::delete('contacts/{id}','ContactProjetController@destroy');

Route::get('contactts/{id}','ContactArticleController@addArticle');
Route::get('contactts/{id}/create','ContactArticleController@create');
Route::post('contactts/{id}','ContactArticleController@store');
Route::put('contactts','ContactArticleController@add');
Route::delete('contactts/{id}','ContactArticleController@destroy');

Route::get('actualites','ActualiteController@index');
Route::get('actualites/create','ActualiteController@create');
Route::post('actualites','ActualiteController@store');
Route::get('actualites/{id}/edit','ActualiteController@edit');
Route::put('actualites/{id}','ActualiteController@update');
Route::delete('actualites/{id}','ActualiteController@destroy');


Route::get('stages/{id}/create', 'StageController@create');
Route::post('stages/{id}','StageController@store');
Route::get('stages/{id}/edit', 'StageController@edit');
Route::put('stages/{id}','StageController@update');
Route::delete('stages/{id}','StageController@destroy');

Route::get('materiels' , 'MaterielController@index');
Route::get('materiels/create' , 'MaterielController@create');
Route::post('materiels' , 'MaterielController@store');
Route::get('materiels/{id}/details' , 'MaterielController@details');
Route::get('materiels/{id}/edit' , 'MaterielController@edit');
Route::put('materiels/{id}' , 'MaterielController@update');
Route::put('materiels/{id}' , 'MaterielController@storeAfterNot');
Route::put('materielsRendre/{id}' , 'MaterielController@rendre');
Route::delete('materiels/{id}' , 'MaterielController@destroy');

Route::get('categories/create' , 'CategorieController@create');
Route::post('categories','CategorieController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//projet de front

Route::get('/statistics',function(){

	$year = date('Y');

     $a1 = DB::table('theses')->whereYear('date_debut',$year)->whereNotNull('date_soutenance')->count();
     $a2 = DB::table('theses')->whereYear('date_debut',$year-1)->whereNotNull('date_soutenance')->count();
     $a3 = DB::table('theses')->whereYear('date_debut',$year-2)->whereNotNull('date_soutenance')->count();
     $a4 = DB::table('theses')->whereYear('date_debut',$year-3)->whereNotNull('date_soutenance')->count();
     $a5 = DB::table('theses')->whereYear('date_debut',$year-4)->whereNotNull('date_soutenance')->count();
     $a6 = DB::table('theses')->whereYear('date_debut',$year-5)->whereNotNull('date_soutenance')->count();
     $a7 = DB::table('theses')->whereYear('date_debut',$year-6)->whereNotNull('date_soutenance')->count();

	 $b1 = DB::table('theses')->whereYear('date_debut',$year)->whereNull('date_soutenance')->count();
	 $b2 = DB::table('theses')->whereYear('date_debut',$year-1)->whereNull('date_soutenance')->count();
	 $b3 = DB::table('theses')->whereYear('date_debut',$year-2)->whereNull('date_soutenance')->count();
	 $b4 = DB::table('theses')->whereYear('date_debut',$year-3)->whereNull('date_soutenance')->count();
	 $b5 = DB::table('theses')->whereYear('date_debut',$year-4)->whereNull('date_soutenance')->count();
	 $b6 = DB::table('theses')->whereYear('date_debut',$year-5)->whereNull('date_soutenance')->count();
	 $b7 = DB::table('theses')->whereYear('date_debut',$year-6)->whereNull('date_soutenance')->count();

	 //$date = new Carbon( $these->date_debut );  

	 //$t1 = DB::table('theses')->distinct('id')->where(,$year)->count();

    $annee = [$year-6,$year-5,$year-4,$year-3,$year-2,$year-1,$year];
    $these_s = [$a7, $a6, $a5,$a4,$a3,$a2,$a1];
    $these = [$b7, $b6, $b5,$b4,$b3,$b2,$b1];
  
	return response()->json(["annee"=>$annee,
							 "these_s"=> $these_s,
							 "these"=> $these
							]);
});

Route::any('/search',function(){

	$labo = Parametre::find('1'); 
    $q = Input::get ( 'q' );
    $membres = User::where('name','LIKE','%'.$q.'%')->orWhere('prenom','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    $theses = These::where('titre','LIKE','%'.$q.'%')->orWhere('sujet','LIKE','%'.$q.'%')->get();
    $articles = Article::where('titre','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
    $projets = Projet::where('intitule','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
    $equipes = Equipe::where('intitule','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('achronymes','LIKE','%'.$q.'%')->get();

        // return view('search')->withDetails($user)->withQuery ( $q );
        return view('search')->with([
            'membres' => $membres,
            'theses' => $theses,
            'articles' => $articles,
            'projets' => $projets,
            'equipes' => $equipes,
            'labo'=>$labo,
            
        ]);;

});


Route::get('membreList','UserController@listt');
Route::get('membreTrombin','UserController@trombin');
Route::get('membre/{id}/detailsF','UserController@detailsF');

Route::get('listeEquipe','EquipeController@indexF');
Route::get('equipe/{id}/detailsF','EquipeController@detailsF');

Route::get('projects','ProjetController@indexF');
Route::get('projects/{id}/detailsF','ProjetController@detailsF');

Route::get('equipe','EquipeController@detailsF');
Route::get('front/{id}/equipe','EquipeController@detailsF');
Route::get('apropos', 'HomeController@apropos');

Route::get('thesesF','TheseController@indexF');

Route::get('listactualite','ActualiteController@acceuil');
Route::get('actualitesF','ActualiteController@indexF');
Route::get('actualitesF/{id}/detailsF','ActualiteController@detailsF');

