<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models;
use App\Models\Post;
use App\Models\User;
use App\Models\yuna;
use Illuminate\Support\Facades\Auth;

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

Route::prefix('admin')->group(function()
{
    Route::resource('/post', PostController::class);
    Route::resource('/user', UserController::class);

    Route::get('/', function(){
        $news = Post::count();
        $viewPost = Post::where('post_view', '0')->count();
        return view('admin.adminmain')->with(compact('news', 'viewPost'));
    });

    // Route::get('/create', function(){
    //     return view('admin.create');
    // });

    // Route::post('/create', function(){
    //     return 'post done.';
    // });

});

Route::prefix('/')->group(function()
{
    Route::get('/',function () {
        return view('member.index');
    });

    Route::get('/home',function () {
        return view('member.index');
    })->name('home');

    Route::get('basketball', function () {
        return view('member.category');
    })->name('basketball');

    Route::get('football', function () {
        return view('member.category');
    })->name('football');

    Route::get('volleyball', function () {
        return view('member.category');
    })->name('volleyball');

    Route::get('esport', function () {
        return view('member.category');
    })->name('esport');
});

Route::prefix('categories')->group(function()
{
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.list');
    Route::get('/edit-{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');
    Route::post('/edit-{id}', [CategoriesController::class, 'updateCategory']);
    Route::get('/add', [CategoriesController::class, 'addCategory'])->name('categories.add');

    Route::post('/add', [CategoriesController::class, 'handleAddCategory']);
    //delete
    Route::delete('/delete-{id}', [CategoriesController::class, 'destroyCategory'])->name('categories.delete');
});

Auth::routes();

Route::get('/home-admin', [HomeController::class, 'index'])->name('home-admin');

