<?php

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\Centre4cController;
use App\Http\Controllers\CommentActiviteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\GenerateurformController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\LienutileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ModelecvController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\ParticiperController;
use App\Http\Controllers\RecherchController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleformController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SujetController;
use App\Http\Controllers\TentativeController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TypeactiviteController;
use App\Http\Controllers\TypeoffreController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ChangePasswordController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 

// Protected Routes

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/sujets', [SujetController::class, 'index']);
    Route::get('/tentatives', [TentativeController::class, 'index']);
    Route::get('/topics', [TopicController::class, 'index']);
    Route::get('/reclamations', [ReclamationController::class, 'index']);
    Route::get('/reponses', [ReponseController::class, 'index']);
    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/role_forms', [RoleformController::class, 'index']);
    Route::get('/participers', [ParticiperController::class, 'index']);
    Route::get('/messages', [MessageController::class, 'index']);
    Route::get('/modele_cv', [ModelecvController::class, 'index']);
    Route::get('/enseignants', [EnseignantController::class, 'index']);
    Route::get('/etudiants', [EtudiantController::class, 'index']);
    Route::get('/filieres', [FiliereController::class, 'index']);
    Route::get('/formulaires', [FormulaireController::class, 'index']);
    Route::get('/generateur_forms', [GenerateurformController::class, 'index']);
    Route::get('/groupes', [GroupeController::class, 'index']);
    Route::get('/inputes', [InputController::class, 'index']);
    Route::get('/comment_activites', [CommentActiviteController::class, 'index']);
    Route::get('/comments', [CommentController::class, 'index']);
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/resetPassword', [ChangePasswordController::class, 'process']);
    Route::post('profile', [AuthController::class, 'profil']);
});

// Public Routes
Route::get('/type_activites', [TypeactiviteController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/activites/{id}', [ActiviteController::class, 'index']);
Route::get('/actualites', [ActualiteController::class, 'index']);
Route::get('/albums', [AlbumController::class, 'index']);
Route::get('/centres', [Centre4cController::class, 'index']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/documents', [DocumentController::class, 'index']);
Route::get('/lien_utiles', [LienutileController::class, 'index']);
Route::get('/partenaires', [PartenaireController::class, 'index']);
Route::get('/recherches', [RecherchController::class, 'index']);
Route::get('/slides', [SlideController::class, 'index']);
Route::get('/offres', [OffreController::class, 'index']);
Route::get('/type_offres', [TypeoffreController::class, 'index']);
Route::post('/sendPasswordResetLink', [ResetPasswordController::class, 'sendEmail']);
