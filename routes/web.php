<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\SubtitleController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use App\Models\Title;
use App\Models\Subtitle;
use App\Models\Description;
use App\Models\Image;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $titles = Title::all();
    $subtitles = Subtitle::all();
    $descriptions = Description::all();
    $images = Image::all();
    return view('welcome', compact('titles', 'subtitles', 'descriptions', 'images'));
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'products' => ProductController::class,
    'templates' => TemplateController::class,
    'titles' => TitleController::class,
    'subtitles' => SubtitleController::class,
    'descriptions' => DescriptionController::class,
    'images' => ImageController::class,
]);

Route::middleware(['auth'])->group(function () {

    Route::get('templates', [App\Http\Controllers\TemplateController::class, 'index'])->name('templates.index');
    Route::get('templates/show', [App\Http\Controllers\TemplateController::class, 'show'])->name('templates.show');
    Route::get('templates/create', [App\Http\Controllers\TemplateController::class, 'create'])->name('templates.create');
    Route::post('templates', [App\Http\Controllers\TemplateController::class, 'store'])->name('templates.store');
    Route::get('/templates/{template}/edit', [TemplateController::class, 'edit'])->name('templates.edit');
    Route::delete('/templates/{template}', [TemplateController::class, 'destroy'])->name('templates.destroy');
    Route::resource('templates', TemplateController::class);
    

    Route::get('titles', [\App\Http\Controllers\TitleController::class, 'index'])->name('titles.index');
    Route::get('templates/show', [App\Http\Controllers\TemplateController::class, 'show'])->name('templates.show');
    Route::get('titles/create', [App\Http\Controllers\TitleController::class, 'create'])->name('titles.create');
    Route::post('titles', [App\Http\Controllers\TitleController::class, 'store'])->name('titles.store');
    Route::get('/titles/{title}/edit', [TitleController::class, 'edit'])->name('titles.edit');
    Route::delete('/titles/{title}', [TitleController::class, 'destroy'])->name('titles.destroy');
    Route::resource('titles', TitleController::class);
});