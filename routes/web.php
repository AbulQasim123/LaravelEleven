<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdminExample;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\{
    PostController,
    RoleController,
    UserController,
    AdminController,
    AnchorController,
    BlogController,
    CommentController,
    ContactController,
    CountryController,
    StudentController,
    CustomerController,
    ImageController,
    JsonDataController,
    NewsController,
    OrderController,
    VedioController
};
use App\Models\Anchor;
use Carbon\PHPStan\LazyMacro;
use Carbon\PHPStan\Macro;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [PostController::class, 'index'])
    ->middleware('is_admin:asdmin')->name('test');

Route::resource('students', StudentController::class);
Route::resource('contacts', ContactController::class);
Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);
Route::resource('admins', AdminController::class);
Route::resource('roles', RoleController::class);
Route::resource('customers', CustomerController::class);
Route::resource('orders', OrderController::class);
Route::resource('countries', CountryController::class);
Route::resource('anchors', AnchorController::class);
Route::resource('news', NewsController::class);
Route::resource('images', ImageController::class);
Route::resource('blogs', BlogController::class);
Route::resource('videos', VedioController::class);
Route::resource('comments', CommentController::class);
Route::resource('jsondatas', JsonDataController::class);

Route::get('test-macro', function () {
    return Response::something(Anchor::get(['name','email']));
});
