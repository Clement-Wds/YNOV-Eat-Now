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

Route::view('/','web/home');

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


//Afficher tous les utilisateurs
Route::get('/index', 'App\Http\Controllers\UserController@index');