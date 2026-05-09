<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BusinessProfileController;
use App\Http\Controllers\DescriptionController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->prefix('mybizplan')->group(function () {
    Route::get('/description', function(){
        return view('section.description');
            // ->name('bizplan.description');
    });

    Route::get('/competitive', function(){
        return view('section.competitive');
        // ->name('bizplan.competitive');
    });

    Route::get('/financial', function(){
        return view('section.finance');
        // ->name('bizplan.financial');
    });

    Route::get('/management', function(){
        return view('section.management');
        // ->name('bizplan.management');
    });

    Route::get('/operational', function(){
        return view('section.operational');
        // ->name('bizplan.operational');
    });

    Route::get('/products', function(){
        return view('section.products');
        // ->name('bizplan.products');
    });

    Route::get('/research', function(){
        return view('section.research');
        // ->name('bizplan.research');
    });

    Route::get('/strategies', function(){
        return view('section.strategies');
        // ->name('bizplan.strategies');
    });

    Route::get('/business_profile', function(){
        return view('business_profile');
    });

    Route::get('/bizplan_profile_created', function(){
        return view('biz_profile');
    });

});

Route::middleware(['auth'])->group(function () {
    Route::get('/business_profile', [BusinessProfileController::class, 'index'])->name('business_profile');
    Route::get('/create_business_profile', [BusinessProfileController::class, 'create'])->name('create_business_profile');
    Route::post('/store_business_profile', [BusinessProfileController::class, 'createBusinessProfile'])->name('new_profile');
    Route::get('/', [BusinessProfileController::class, 'index'])->name('dashboard.index');
    // Route::get('/business-profile/{id}', [BusinessProfileController::class, 'index'])->name('dashboard.index2');
    Route::get('/mybizplan/manage/{id}', [BusinessProfileController::class, 'manage'])->name('bizplan.manage');

    Route::post('create_description', [DescriptionController::class, 'createDescription'])->name('create.description');


    Route::prefix('mybizplan')->group(function(){
        // Route::get
    });
});

Route::get('/auth_login', function(){
    return view('auths.login');
});


Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
