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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

#admin blog
$groupData = [
  'namespace'   =>  'App\Http\Controllers\Blog\Admin',
  'prefix'      =>  'admin/blog'
];
Route::group($groupData, function (){
   $methods = ['index', 'edit', 'store', 'update', 'create'];
   Route::resource('categories', 'CategoryController')
       ->only($methods)
       ->middleware(['auth'])
       ->names('blog.admin.categories');

   Route::resource('posts', 'PostController')
       ->except(['show'])
       ->middleware(['auth'])
       ->names('blog.admin.posts');
});

#admin conference section
$groupData = [
    'namespace'   =>  'App\Http\Controllers\Conference\Admin',
    'prefix'      =>  'admin/conference'
];
Route::group($groupData, function (){
    $methods = ['index', 'edit', 'store', 'update', 'create'];
    Route::resource('sections', 'SectionController')
        ->only($methods)
        ->middleware(['auth'])
        ->names('conference.admin.sections');
});
