<?php

use App\Http\Controllers\Admin\DashboardController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Author\DashboardController as AuthorDashboardController;
use PharIo\Manifest\Email;

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


Route::get('/', [StudentController::class, 'index'])->name('home');
Route::get('/create', [StudentController::class, 'create'])->name('create');
Route::post('/create', [StudentController::class, 'store'])->name('store');
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [StudentController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [StudentController::class, 'delete'])->name('delete');

Route::get('/test', [TestController::class, 'index']);

/* Route::get('/', function () 
{
    return view('welcome');
}
); */

/* Route::get('/hello', function () 
{
    return  "Hello World";
}
);

Route::get('/user/{id}', function ($id) 
{
    return  "Your id is : ".$id;
}
); */

Route::get('/contact',  function () {
    return view('contact');
})->middleware('age');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('password.change');
Route::post('/change-password', [ChangePasswordController::class, 'changepassword'])->name('password.update');

Route::group(
    ['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']],
    function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    }

);


Route::group(
    ['as' => 'author.', 'prefix' => 'author', 'namespace' => 'Author', 'middleware' => ['auth', 'author']],
    function () {
        Route::get('dashboard', [AuthorDashboardController::class, 'index'])->name('dashboard');
    }

);
//Copy css and js in app.blade.php https://getbootstrap.com/docs/4.3/getting-started/introduction/
/*
This solution may help you if you know your problem is limited to Facades and you are running Laravel 5.5 or above.
Install laravel-ide-helper
composer require --dev barryvdh/laravel-ide-helper
Add this conditional statement in your AppServiceProvider to register the helper class.
public function register()
{
    if ($this->app->environment() !== 'production') {
        $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
    }
    // ...
}
Then run php artisan ide-helper:generate to generate a file to help the IDE understand Facades. You will need to restart Visual Studio Code.
*/

/*
For Email
https://medium.com/graymatrix/using-gmail-smtp-server-to-send-email-in-laravel-91c0800f9662 
*/