<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@home');

//Page Home avec la liste des restaurants
Route::get('/home', 'App\Http\Controllers\RestaurantController@listeRestaurant');

//Se déconnecter
Route::get('/signout', 'App\Http\Controllers\UserAccountController@signout');

//INSCRIPTION
//Affichage formulaire d'inscription
Route::get('/inscription', 'App\Http\Controllers\InscriptionCOntroller@formulaire');
//Réception et traitement des données du formulaire
Route::post('/inscription', 'App\Http\Controllers\InscriptionCOntroller@createUser');

//CONNEXION
//Affichage formulaire connexion
Route::get('/connexion', 'App\Http\Controllers\ConnexionController@formulaire');
//Récupération et traitement des données du formulaire
Route::post('/connexion', 'App\Http\Controllers\ConnexionController@connexion');

//RESTAURANT
//Affichage du formulaire de création du restaurant
Route::get('/create_restaurant', 'App\Http\Controllers\UserAccountController@createRestaurant');
//Création du restaurant
Route::post('/new_restaurant', 'App\Http\Controllers\InscriptionRestoController@createRestaurant');

//Afficher le tableau de bord du restaurateur
Route::get('/dashboard', 'App\Http\Controllers\RestaurantController@dashboard');

//Afficher tous les utilisateurs
Route::get('/index', 'App\Http\Controllers\UserController@index');

//Gérer un restaurant
Route::get('/restaurant/manage/{id}', 'App\Http\Controllers\RestaurantController@manageRestaurant')->name('manage.Restaurant');