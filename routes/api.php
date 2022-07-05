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
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartnerTypeController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\LesServicesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;


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
    Route::get('/tentatives', [TentativeController::class, 'index']);
    Route::get('/topics', [TopicController::class, 'index']);
    
    Route::get('/reponses', [ReponseController::class, 'index']);
    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/role_forms', [RoleformController::class, 'index']);
    Route::get('/participers', [ParticiperController::class, 'index']);
    Route::post('/messages', [MessageController::class, 'message']);
    Route::get('/modele_cv', [ModelecvController::class, 'index']);
    Route::get('/enseignants', [EnseignantController::class, 'index']);
    Route::get('/etudiants', [EtudiantController::class, 'index']);
    Route::get('/filieres', [FiliereController::class, 'index']);
    Route::get('/formulaires', [FormulaireController::class, 'index']);
    Route::get('/generateur_forms', [GenerateurformController::class, 'index']);
    Route::get('/groupes', [GroupeController::class, 'index']);
    Route::get('/inputes', [InputController::class, 'index']);
    Route::get('/comments', [CommentController::class, 'index']);
    Route::get('/users', [UserController::class, 'index']);

 
});
  

// Public Routes


Route::get('/sujets', [SujetController::class, 'index']);
Route::get('/partners', [PartnerTypeController::class, 'index']);
Route::post('/actualite', [ActualiteController::class, 'store']);
Route::get('/type_activites', [TypeactiviteController::class, 'index']);
Route::get('/type_services', [TypeServicesController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/footer', [FooterController::class, 'index']);
Route::get('/activites/{id}', [ActiviteController::class, 'index']);
Route::get('/service', [ServicesController::class, 'index']);
Route::get('/homeactactivites', [ActiviteController::class, 'activites']);
Route::get('/activite/{id}', [ActiviteController::class, 'details']);
Route::get('/comment_activites', [CommentActiviteController::class, 'index']);
Route::get('/actualites/{id}', [ActualiteController::class, 'index']);
Route::get('/actualite/{id}', [ActualiteController::class, 'details']);
Route::get('/albums', [AlbumController::class, 'index']);
Route::get('/photos/{id}', [AlbumController::class, 'details']);
Route::get('/centres', [Centre4cController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'contact']);
Route::get('/documents/{id}', [DocumentController::class, 'index']);
Route::get('/lien_utiles', [LienutileController::class, 'index']);
Route::get('/partenaires', [PartenaireController::class, 'index']);
Route::get('/recherches', [RecherchController::class, 'index']);
Route::get('/slides', [SlideController::class, 'index']);
Route::get('/services', [LesServicesController::class, 'index']);
Route::get('/offres/{id}', [OffreController::class, 'index']);
Route::get('/offre/{id}', [OffreController::class, 'details']);
Route::get('/certif', [CertificationController::class, 'index']);
Route::get('/type_offres', [TypeoffreController::class, 'index']);
Route::get('/equipe',[EquipeController::class, 'index']);
Route::post('/newsletter',[NewsletterController::class, 'newsletter']);

Route::put('/updateprofile/{id}', [ProfileController::class, 'updateProfile']);
   Route::post('/resume', [ResumeController::class, 'experience']);
    Route::post('/resumeducation', [ResumeController::class, 'education']);
    Route::post('/skills', [ResumeController::class, 'skills']);
    Route::post('/summary', [ResumeController::class, 'summary']);
    Route::get('/getexp', [ResumeController::class, 'getExperience']);
    Route::get('/geteduc', [ResumeController::class, 'getEducation']);
    Route::get('/getskills', [ResumeController::class, 'getSkills']);
    Route::get('/getsum', [ResumeController::class, 'getSummary']);
    Route::post('/comment_activites', [CommentActiviteController::class, 'store']);
    Route::put('/changepassword', [ProfileController::class, 'change_password']);
    Route::post('/updateavatar/{id}', [ProfileController::class, 'updateAvatar']);
        Route::post('/logout', [AuthController::class, 'logout']);   
    Route::post('/reclamations', [ReclamationController::class, 'reclamation']);
    Route::post('/reset-password', [PasswordResetLinkController::class, 'ResetPasswordStore']);
    
    
    Route::get('/profile', [ProfileController::class, 'index']);
