<?php

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
    return view('welcome');
});


Route::get('/start/{age}/{tel?}','TestController@afficher_msg')
->where(['id' => '[0-9]+', 'age' => '[0-9]+']);

Route::get('respSimple', function () {
    return response('hello World',404)->header('Content-Type','text/plain');
});

Route::get('/ageInvalide', function () {
    return ('désolé vous ne pouvez pas accéder à cette page');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('mongo','clients@insertion');

Route::get('AddClient/{name}/{tel}/{age}/{email}',function($name,$tel,$age,$email){
    $c= new App\Client();
    $c->name = $name;
    $c->tel = $tel;
    $c->age=$age;
    $c->email=$email;
    $c->save();
    return('ok');
});
/************************** Route Client **************************************/
Route::get('AddClientForm','ClientController@AddClientForm')->name('AddClientForm');
Route::post('AddClientAction','ClientController@AddClientAction')->name('AddClientAction');
Route::get('ShowClients','ClientController@ShowClients')->name('ShowClients');
Route::get('EditClientForm/{id}','ClientController@EditClientForm')->name('EditClientForm');
Route::get('EditClientAction/{id}','ClientController@EditClientAction')->name('EditClientAction');
Route::get('supprimer/{id}','ClientController@destroy')->name('supprimer');
Route::get('searchClientForm','ClientController@searchClientForm')->name('searchClientForm');
Route::get('SearcheClientAction','ClientController@SearcheClientAction')->name('SearcheClientAction');



/************************** Route Categorie **************************************/
Route::get('AddCategorieForm','CategorieController@AddCategorieForm')->name('AddCategorieForm');
Route::post('AddCategorieAction','CategorieController@AddCategorieAction')->name('AddCategorieAction');
Route::get('ShowCategories','CategorieController@ShowCategories')->name('ShowCategories');
Route::get('supprimerCategorie/{id}','CategorieController@destroy')->name('supprimerCategorie');
Route::get('EditCategorieForm/{id}','CategorieController@EditCategorieForm')->name('EditCategorieForm');
Route::get('EditcatAction/{id}','CategorieController@EditcatAction')->name('EditcatAction');
Route::get('searchCategorieForm','CategorieController@searchCategorieForm')->name('searchCategorieForm');
Route::get('SearcheCategorieAction','CategorieController@SearcheCategorieAction')->name('SearcheCategorieAction');

/************************** Route Produit **************************************/
Route::get('AddProduitForm','ProduitController@AddProduitForm')->name('AddProduitForm');
Route::post('AddProduitAction','ProduitController@AddProduitAction')->name('AddProduitAction');
Route::get('ShowProduit','ProduitController@ShowProduit')->name('ShowProduit');
Route::get('supprimerProduit/{id}','ProduitController@destroy')->name('supprimerProduit');
Route::get('EditProduitForm/{id}','ProduitController@EditProduitForm')->name('EditProduitForm');
Route::post('EditProduitAction/{id}','ProduitController@EditProduitAction')->name('EditProduitAction');


/************************** Route avec resource **************************************/
Route::resource('commande','CommandeController');

Route::get('add/{id}', 'CommandeController@create');
Route::get('AddCommandeForm', 'CommandeController@index')->name('AddCommandeForm');
Route::get('prixunitaire/{id}', 'CommandeController@prix')->name('prixunitaire');
Route::post('AddCommandeAction', 'CommandeController@store')->name('AddCommandeAction');
Route::get('ShowCommande', 'CommandeController@show')->name('ShowCommande');
Route::get("pdf/{id}","HomeController@downloadPDF")->name('pdf');
/*****Statistiques****/
Route::get('statistiques','HomeController@statistiques')->name('statistiques');

/*****API****/
Route::get('ReadAPIClients','ClientController@ReadAPIClients')->name('ReadAPIClients');

Route::get('cart', function(){
    return Cart::getContent();
});

Route::get('clear', function(){
    $clear = Cart::clear();
    if($clear){
        return Cart::getContent();
    }
});

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});



