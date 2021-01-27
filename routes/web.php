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

//PAGE HOME
Route::get('/', 'App\Http\Controllers\HomeController@home');
//Page Home des clients avec la liste des restaurants
Route::get('/home', 'App\Http\Controllers\RestaurantController@listeRestaurant');
//Afficher la page Home des retaurateurs
Route::get('/homeResto', 'App\Http\Controllers\RestaurantController@homeResto');


//INSCRIPTION
//Affichage formulaire d'inscription
Route::get('/inscription', 'App\Http\Controllers\InscriptionCOntroller@form');
//Réception et traitement des données du formulaire
Route::post('/inscription', 'App\Http\Controllers\InscriptionCOntroller@createUser');


//CONNEXION
//Affichage formulaire connexion
Route::get('/connexion', 'App\Http\Controllers\ConnexionController@form');
//Récupération et traitement des données du formulaire
Route::post('/connexion', 'App\Http\Controllers\ConnexionController@connexion');


//DECONNEXION
Route::get('/signout', 'App\Http\Controllers\UserAccountController@signout');


//UTILISATEUR
//Affichage de la vue de gestion du compte
Route::get('/profile', 'App\Http\Controllers\UserController@profile');
//Afficher le formulaire de modification du profil
Route::get('/edit_profile', 'App\Http\Controllers\UserController@formEditProfile');
//Mettre à jour les informations du profil
Route::post('/edit_profile', 'App\Http\Controllers\UserController@editProfile');

//Affichage de la vie de gestion du solde
Route::get('/balance', 'App\Http\Controllers\BalanceController@form');
//Réapprovisionner le solde
Route::post('/pay', 'App\Http\Controllers\BalanceController@pay');


//RESTAURANT
//Affichage du formulaire de création du restaurant
Route::get('/create_restaurant', 'App\Http\Controllers\InscriptionRestoController@form');
//Création du restaurant
Route::post('/new_restaurant', 'App\Http\Controllers\InscriptionRestoController@createRestaurant');
//Afficher le tableau de bord du restaurateur
Route::get('/dashboard', 'App\Http\Controllers\RestaurantController@dashboard');
//Gérer un restaurant
Route::get('/restaurant/manage/{id}', 'App\Http\Controllers\RestaurantController@manageRestaurant')->name('manage.Restaurant');
//Page Profil Restaurant
Route::get('/restaurant/{id}', 'App\Http\Controllers\DishRestaurantController@profileRestaurant')->name('profile.Restaurant');


//GESTION DES PLATS
//Afficher le formulaire de création de plat
Route::get('/create_dish/{id}', 'App\Http\Controllers\DishController@createDishForm')->name('create.Dish');
//Créer un plat
Route::post('/create_dish/{id}/new_dish', 'App\Http\Controllers\DishController@createDish');
//Affichage du formulaire de modification du plat
Route::get('/edit_dish/{id}', 'App\Http\Controllers\DishController@editDishForm')->name('edit.Dish');
//Enregistrer les modifications
Route::post('/edit_dish/{id}/send', 'App\Http\Controllers\DishController@editDish');
//Supprimer un plat
Route::get('/delete_dish/{id}', 'App\Http\Controllers\DishController@deleteDish')->name('delete.Dish');


//ADMIN
//Afficher tous les utilisateurs
Route::get('/index', 'App\Http\Controllers\UserController@index');
