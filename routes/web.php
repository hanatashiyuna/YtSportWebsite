<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;
use App\Models;
use App\Models\Post;
use App\Models\User;
use App\Models\Views;
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

Route::group(['middleware' => ['auth', 'role:admin|editer|writer']], function()
{
    Route::resource('admin/', AdminController::class);
    Route::resource('admin/post', PostController::class);
    Route::resource('admin/user', UserController::class);
});

Route::prefix('/')->group(function()
{
    Route::resource('/', ViewsController::class);

    Route::get('',function(){
        $i=1;
        $members = Post::orderBy('post_id','DESC')->limit(3)->get();
        $basketball = Post::where('category','basketball')->limit(4)->get();;
        $esport =Post::where('category','esport')->limit(4)->get();;
        $football = Post::where('category','football')->limit(4)->get();
        return view('member.index',compact('members','i','basketball','football','esport'));
    });

    Route::get('/home',function () {
        $i=1;
        $members = Post::orderBy('post_id','DESC')->limit(3)->get();
        $basketball = Post::where('category','basketball')->limit(4)->get();;
        $esport =Post::where('category','esport')->limit(4)->get();;
        $football = Post::where('category','football')->limit(4)->get();
        return view('member.index',compact('members','i','basketball','football','esport'));
    })->name('home');


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


Route::get('blog-{id}',[PostController::class ,'show'] );

Route::get('category-{name}',[PostController::class ,'category']);


Auth::routes();

Route::get('/home-admin', [HomeController::class, 'index'])->name('home-admin');

