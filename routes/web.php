<?php

use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PagesController::class,'index']);

//WEB routes
Route::get('o-nama',[PagesController::class,'aboutUs'])->name('about-us');
Route::get('kontakt',[PagesController::class,'contact'])->name('contact');

//Video
Route::get('video',[PodcastController::class,'getVideos'])->name('video');

//News
Route::get('sve-vesti',[NewsController::class,'getAll'])->name('get-all-news');
Route::get('vest/{id}',[NewsController::class,'getById']);

//Analysis
Route::get('analize',[AnalysisController::class,'getAll'])->name('get-all-analysis');
Route::get('analiza/{id}',[AnalysisController::class,'getById']);

//Events
Route::get('događaji',[EventController::class,'getAll'])->name('get-all-events');
Route::get('događaj/{id}',[EventController::class,'getById']);

//Announcement
Route::get('najave',[AnnouncementController::class,'getAll'])->name('get-all-announcements');
Route::get('najava/{id}',[AnnouncementController::class,'getById']);

//Project
Route::get('projekti',[ProjectController::class,'getAll'])->name('get-all-projects');
Route::get('projekat/{id}',[ProjectController::class,'getById']);

//Publication
Route::get('publikacije',[PublicationController::class,'getAll'])->name('get-all-publications');
Route::get('publikacija/{id}',[PublicationController::class,'getById']);

Route::get('/pretraga',[PagesController::class,'search'])->name('search');

Route::get('index',function (){
    return true;
})->name('index');


//CMS  routes
Route::middleware('auth')->prefix('admin')->group(function (){
    //Users
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/edit-user', [UserController::class, 'edit']);
    Route::get('/user-edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
    Route::get('/create-user', [UserController::class, 'addUser']);
    Route::post('/store-user', [UserController::class, 'storeUser']);
    Route::post('/update-user', [UserController::class, 'update'])->name('update.user');
    Route::post('/user-update', [UserController::class, 'updateUser'])->name('user.update');
    Route::post('/delete-user', [UserController::class, 'destroy'])->name('delete.user');

    //Analysis
    Route::get('/analysis', [AnalysisController::class, 'index']);
    Route::get('/create-analysis', [AnalysisController::class, 'create']);
    Route::post('/store-analysis', [AnalysisController::class, 'store']);
    Route::get('/edit-analysis/{id}', [AnalysisController::class, 'edit'])->name('edit.analysis');
    Route::post('/update-analysis/{id}', [AnalysisController::class, 'update'])->name('update.analysis');
    Route::post('/delete-analysis/{id}', [AnalysisController::class, 'delete'])->name('delete.analysis');
    Route::post('/upload/analysis/photo', [AnalysisController::class, 'uploadTinyImg']);

    //News
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/create-news', [NewsController::class, 'create']);
    Route::post('/store-news', [NewsController::class, 'store']);
    Route::get('/edit-news/{id}', [NewsController::class, 'edit'])->name('edit.news');
    Route::post('/update-news/{id}', [NewsController::class, 'update'])->name('update.news');
    Route::post('/delete-news/{id}', [NewsController::class, 'delete'])->name('delete.news');
    Route::post('/upload/news/photo', [NewsController::class, 'uploadTinyImg']);

    //Events
    Route::get('/events', [EventController::class, 'index']);
    Route::get('/create-event', [EventController::class, 'create']);
    Route::post('/store-event', [EventController::class, 'store']);
    Route::get('/edit-event/{id}', [EventController::class, 'edit'])->name('edit.event');
    Route::post('/update-event', [EventController::class, 'update'])->name('update.event');
    Route::post('/delete-event', [EventController::class, 'destroy'])->name('delete.event');
    Route::post('/upload/events/photo', [EventController::class, 'uploadTinyImg']);


    //Announcements
    Route::get('/announcements', [AnnouncementController::class, 'index']);
    Route::get('/create-announcement', [AnnouncementController::class, 'create']);
    Route::post('/store-announcement', [AnnouncementController::class, 'store']);
    Route::get('/edit-announcement/{id}', [AnnouncementController::class, 'edit'])->name('edit.announcement');
    Route::post('/update-announcement/{id}', [AnnouncementController::class, 'update'])->name('update.announcement');
    Route::post('/delete-announcement', [AnnouncementController::class, 'destroy'])->name('delete.announcement');
    Route::post('/upload/announcement/photo', [AnnouncementController::class, 'uploadTinyImg']);

    //Podcasts
    Route::get('/podcasts', [PodcastController::class, 'index']);
    Route::get('/create-podcast', [PodcastController::class, 'create']);
    Route::post('/store-podcast', [PodcastController::class, 'store']);
    Route::get('/edit-podcast/{id}', [PodcastController::class, 'edit'])->name('edit.podcast');
    Route::post('/update-podcast', [PodcastController::class, 'update'])->name('update.podcast');
    Route::post('/delete-podcast', [PodcastController::class, 'destroy'])->name('delete.podcast');

    //Publications
    Route::get('/publications', [PublicationController::class, 'index']);
    Route::get('/create-publication', [PublicationController::class, 'create']);
    Route::post('/store-publication', [PublicationController::class, 'store']);
    Route::get('/edit-publication/{id}', [PublicationController::class, 'edit'])->name('edit.publication');
    Route::post('/update-publication', [PublicationController::class, 'update'])->name('update.publication');
    Route::get('/publication-create-pdf/{id}', [PublicationController::class, 'createPdf'])->name('publication.create.pdf');
    Route::post('/publication-store-pdf', [PublicationController::class, 'changePdf']);
    Route::get('/download-publication/{id}', [PublicationController::class, 'downloadPdf'])->name('download.publication');
    Route::post('/delete-publication', [PublicationController::class, 'destroy'])->name('delete.publication');


    //Projects
    Route::get('/projects', [ProjectController::class, 'index']);
    Route::get('/create-project', [ProjectController::class, 'create']);
    Route::post('/store-project', [ProjectController::class, 'store']);
    Route::get('/edit-project/{id}', [ProjectController::class, 'edit'])->name('edit.project');
    Route::post('/update-project', [ProjectController::class, 'update'])->name('update.project');
    Route::get('/project-create-pdf/{id}', [ProjectController::class, 'createPdf'])->name('project.create.pdf');
    Route::post('/project-store-pdf', [ProjectController::class, 'changePdf']);
    Route::get('/download-project/{id}', [ProjectController::class, 'downloadPdf'])->name('download.project');
    Route::post('/delete-project', [ProjectController::class, 'destroy'])->name('delete.project');


    //Team Members
    Route::get('/team-members', [TeamMemberController::class, 'index'])->name('team.member.index');
    Route::get('/create-team-member', [TeamMemberController::class, 'create']);
    Route::post('/store-team-member', [TeamMemberController::class, 'store']);
    Route::get('/edit-team-member/{id}', [TeamMemberController::class, 'edit'])->name('edit.team.member');
    Route::post('/update-team-member', [TeamMemberController::class, 'update'])->name('update.team.member');
    Route::get('/team-member-photo/{id}', [TeamMemberController::class, 'showAllPhotos'])->name('team.member.photo');
    Route::delete('/delete-picture-team-member/{id}', [TeamMemberController::class, 'deletePicture'])->name('delete.team.member.picture');
    Route::get('/team-member-create-picture/{id}', [TeamMemberController::class, 'createPicture'])->name('team.member.create.picture');;
    Route::post('/team-member-store-picture', [TeamMemberController::class, 'storePicture']);
    Route::get('/download-team-member/{id}', [TeamMemberController::class, 'downloadPdf'])->name('download.team.member');
    Route::post('/delete-team-member', [TeamMemberController::class, 'destroy'])->name('delete.team.member');
    Route::get('/team-member-create-pdf/{id}', [TeamMemberController::class, 'createPdf'])->name('team.member.create.pdf');
    Route::post('/team-member-store-pdf', [TeamMemberController::class, 'changePdf']);

    //Photos
    Route::get('/photos', [PhotoController::class, 'index']);
    Route::get('/create-photo', [PhotoController::class, 'create']);
    Route::post('/store-photo', [PhotoController::class, 'store']);
    Route::post('/delete/{id}', [PhotoController::class, 'delete'])->name('delete.photo');
});

require __DIR__.'/auth.php';
