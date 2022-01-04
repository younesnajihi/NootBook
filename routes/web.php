<?php

use Inertia\Inertia;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\MycreditController;
use App\Http\Controllers\OthercreditController;
use App\Models\Mycredit;
use App\Models\Othercredit;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/mycredit',[MycreditController::class,'index'])->name('my_credit');

Route::get('/show/{id}',[MycreditController::class,'show'])->name('show_credit');



Route::post('/add-meycredit/{id}',[MycreditController::class,'store'])->name('add_credit');
Route::post('/add-othercredit/{id}',[OthercreditController::class,'store'])->name('add_othercredit');
Route::post('/add-contact',[MycreditController::class,'create'])->name('add_contact');

Route::post('/delete-credit',[MycreditController::class,'delete'])->name('delete_credit');
Route::post('/delete-othercredit',[OthercreditController::class,'delete'])->name('delete_othercredit');

Route::get('/othercredit',[OthercreditController::class,'index'])->name('other_credit');

Route::post('/add-contact-2',[OthercreditController::class,'create'])->name('add_contact_2');

Route::get('/show-credit/{id}',[OthercreditController::class,'show'])->name('show_othercredit');

Route::get('/dashboard', function () {

    
    $mycredit    = Mycredit::where('user_id',Auth::user()->id)->sum('price');
                            -
$mycredit_contact    = Mycredit::where('user_id',Auth::user()->id)->count('id');
                            -

    $othercredit_contact = Othercredit::where('user_id',Auth::user()->id)->count('id');
    $othercredit = Othercredit::where('user_id',Auth::user()->id)->sum('price');

    return Inertia::render('Dashboard',[
        'mycredit_contact' =>$mycredit_contact,
        'othercredit_contact' =>$othercredit_contact,
        'mycredit' =>$mycredit,
        'othercredit' =>$othercredit

    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
