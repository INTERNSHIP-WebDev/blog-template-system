<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConcernController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MailController;
// use App\Http\Controllers\TitleController;
// use App\Http\Controllers\SubtitleController;
// use App\Http\Controllers\DescriptionController;
// use App\Http\Controllers\ImageController;
// use App\Http\Controllers\SocialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Title;
use App\Models\Subtitle;
use App\Models\Description;
use App\Models\Image;
use App\Models\Template;
use App\Models\User;
use App\Models\Category;


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
    $heroTemplates = Template::latest('created_at')->take(4)->get();
    $latestTemplates = Template::all();
    $sidebarPosts = Template::all();

    $fTemplate = Template::latest('created_at')->paginate(4);
    $users = User::all();
    $subtitles = Subtitle::all();
    $descriptions = Description::all();
    $categories = Category::all();

    return view('landing/landing', compact('sidebarPosts', 'categories', 'heroTemplates', 'descriptions', 'subtitles', 'titles', 'fTemplate', 'latestTemplates', 'users'));
});



Route::get('/category', [CategoryController::class, 'category_page'])->name('category');

Route::get('/concern', [ConcernController::class, 'show']);
Route::post('/submit-concern', [ConcernController::class, 'store'])->name('concern.store');

Route::get('/about', [AboutController::class, 'show'])->name('about');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/blog', function () {
    return view('/blog/sample/sample');
});

Route::get('/view_blog/{id}', [BlogController::class, 'view_blog'])->name('view_blog');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'products' => ProductController::class,
    'templates' => TemplateController::class,
    // 'titles' => TitleController::class,
    // 'subtitles' => SubtitleController::class,
    // 'descriptions' => DescriptionController::class,
    // 'images' => ImageController::class,
]);

Route::middleware(['auth'])->group(function () {

    Route::get('blogs', [App\Http\Controllers\TemplateController::class, 'index'])->name('templates.index');
    Route::get('gallery', [App\Http\Controllers\TemplateController::class, 'gallery'])->name('templates.gallery');
    Route::get('blog-grid', [App\Http\Controllers\TemplateController::class, 'grid'])->name('templates.grid');
    Route::get('blog-list', [App\Http\Controllers\TemplateController::class, 'list'])->name('templates.list');
    Route::get('templates/create', [App\Http\Controllers\TemplateController::class, 'create'])->name('templates.create');
    Route::post('templates', [App\Http\Controllers\TemplateController::class, 'store'])->name('templates.store');
    Route::get('/templates/{template}/edit', [TemplateController::class, 'edit'])->name('templates.edit');
    Route::delete('/templates/{template}', [TemplateController::class, 'destroy'])->name('templates.destroy');
    Route::resource('templates', TemplateController::class);

    Route::get('categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::resource('categories', CategoryController::class);

    Route::get('comments', [App\Http\Controllers\CommentController::class, 'index'])->name('comments.index');
    Route::get('comments/create', [App\Http\Controllers\CommentController::class, 'create'])->name('comments.create');
    Route::post('comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::resource('comments', CommentController::class);

    Route::get('emails', [App\Http\Controllers\MailController::class, 'index'])->name('emails.index');
    Route::get('emails/create', [App\Http\Controllers\MailController::class, 'create'])->name('emails.create');
    Route::post('emails', [App\Http\Controllers\MailController::class, 'store'])->name('emails.store');
    Route::get('/emails/{email}/edit', [MailController::class, 'edit'])->name('emails.edit');
    Route::delete('/emails/{email}', [MailController::class, 'destroy'])->name('emails.destroy');
    Route::resource('emails', MailController::class);

    // Route::get('titles', [\App\Http\Controllers\TitleController::class, 'index'])->name('titles.index');
    // Route::get('titles/create', [App\Http\Controllers\TitleController::class, 'create'])->name('titles.create');
    // Route::post('titles', [App\Http\Controllers\TitleController::class, 'store'])->name('titles.store');
    // Route::get('/titles/{title}/edit', [TitleController::class, 'edit'])->name('titles.edit');
    // Route::delete('/titles/{title}', [TitleController::class, 'destroy'])->name('titles.destroy');
    // Route::resource('titles', TitleController::class);
});