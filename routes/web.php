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
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

// LANDING PAGE

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
    $templates = Template::all();

    return view('landing/landing', compact('templates', 'sidebarPosts', 'categories', 'heroTemplates', 'descriptions', 'subtitles', 'titles', 'fTemplate', 'latestTemplates', 'users'));
});

# NON AUTHENTICATED PAGES
Route::get('/category', [CategoryController::class, 'category_page'])->name('category');
# GUEST EMAIL
Route::get('/concern', [App\Http\Controllers\ConcernController::class, 'show'])->name('concern.index');
Route::post('concerns', [App\Http\Controllers\ConcernController::class, 'store'])->name('concern.store');

# MORE
Route::get('/all_blogs', [LandingController::class, 'more'])->name('more'); #all blog
Route::get('/all_activities', [HomeController::class, 'all_activity'])->name('templates.all_activities'); #all activity

# ABOUT
Route::get('/about', [AboutController::class, 'show'])->name('about');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/post/{id}', [BlogController::class, 'view_blog'])->name('view_blog');
Route::get('/post/create_comment/{id}', [BlogController::class, 'create_comment'])->name('create_comment');
Route::get('/post/blog_contacts/{id}', [BlogController::class, 'blog_contacts'])->name('blog_contacts');
Route::post('/post/send_specific_concern/{id}', [BlogController::class, 'send_specific_concern'])->name('send_specific_concern');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

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
    Route::post('/templates/{id}/like', [TemplateController::class, 'toggleLike'])->name('templates.toggleLike');
    Route::resource('templates', TemplateController::class);

    #Pagination
    Route::get('pagination/fetch_data', [App\Http\Controllers\TemplateController::class, 'fetch_data'])->name('templates.fetch_data');
    Route::get('pagination/fetch_list_data', [App\Http\Controllers\TemplateController::class, 'fetch_list_data'])->name('templates.fetch_list_data');
    Route::get('pagination/fetch_grid_data', [App\Http\Controllers\TemplateController::class, 'fetch_grid_data'])->name('templates.fetch_grid_data');
    Route::get('pagination/fetch_gallery_banner_data', [App\Http\Controllers\TemplateController::class, 'fetch_gallery_banner_data'])->name('templates.fetch_gallery_banner_data');
    Route::get('pagination/fetch_gallery_logo_data', [App\Http\Controllers\TemplateController::class, 'fetch_gallery_logo_data'])->name('templates.fetch_gallery_logo_data');
    Route::get('pagination/fetch_gallery_logo_list_data', [App\Http\Controllers\TemplateController::class, 'fetch_gallery_logo_list_data'])->name('templates.fetch_gallery_logo_list_data');
    Route::get('pagination/fetch_gallery_banner_list_data', [App\Http\Controllers\TemplateController::class, 'fetch_gallery_banner_list_data'])->name('templates.fetch_gallery_banner_list_data');
    Route::get('pagination/fetch_data_more', [App\Http\Controllers\HomeController::class, 'fetch_data_more'])->name('templates.fetch_data_more');
    Route::get('pagination/fetch_data_category', [App\Http\Controllers\CategoryController::class, 'fetch_data_category'])->name('categories.fetch_data_category');
    Route::get('pagination/fetch_sent_data', [App\Http\Controllers\MailController::class, 'fetch_sent_data'])->name('emails.fetch_sent_data');

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

    Route::delete('emails/inbox/{id}', [App\Http\Controllers\MailController::class, 'destroyInbox'])->name('emails.destroyInbox');
    Route::delete('emails/sent-mail/{id}', [App\Http\Controllers\MailController::class, 'destroyInbox'])->name('emails.destroyInbox');

    Route::get('emails', [App\Http\Controllers\MailController::class, 'index'])->name('emails.index');
    Route::get('emails/inbox', [App\Http\Controllers\MailController::class, 'inbox'])->name('emails.inbox');
    Route::get('emails/sent-mail', [App\Http\Controllers\MailController::class, 'sent'])->name('emails.sent-mail');
    Route::get('emails/draft', [App\Http\Controllers\MailController::class, 'draft'])->name('emails.draft');
    Route::get('emails/trash', [App\Http\Controllers\MailController::class, 'trash'])->name('emails.trash');
    Route::get('emails/create', [App\Http\Controllers\MailController::class, 'create'])->name('emails.create');
    Route::post('emails', [App\Http\Controllers\MailController::class, 'store'])->name('emails.store');
    Route::get('/emails/{email}/edit', [MailController::class, 'edit'])->name('emails.edit');
    Route::delete('emails', [MailController::class, 'destroy'])->name('emails.destroy');
    Route::resource('emails', MailController::class);
    Route::post('/emails/mark-as-read', [MailController::class, 'markAsRead'])->name('emails.markAsRead');
    Route::post('/emails/mark-as-unread', [MailController::class, 'markAsUnread'])->name('emails.markAsUnread');

    Route::get('guests', [App\Http\Controllers\GuestController::class, 'index'])->name('guests.index');
    Route::get('guests/create', [App\Http\Controllers\GuestController::class, 'create'])->name('guests.create');
    Route::post('guests', [App\Http\Controllers\GuestController::class, 'store'])->name('guests.store');
    Route::get('/guests/{guest}/edit', [GuestController::class, 'edit'])->name('guests.edit');
    Route::delete('/guests/{guest}', [GuestController::class, 'destroy'])->name('guests.destroy');
    Route::resource('guests', GuestController::class);
});