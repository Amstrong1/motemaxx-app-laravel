<?php

use App\Models\Motivation;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MotivationController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\ResConsultationController;
use App\Http\Controllers\UserConsultationController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/migrate', function(){
    Artisan::call('migrate');
    dd('migrated!');
});

Route::get('reboot',function(){
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
      dd('All done!');
  });

Route::get('/', WelcomeController::class)->name('welcome');

Route::get('/home', function () {
    $motivation = Motivation::orderBy('id', 'desc')->first();
    return view('dashboard', compact('motivation'));
})->middleware(['auth', 'verified'])->name('home');

Route::resource('prestation', PrestationController::class);

Route::resource('motivation', MotivationController::class);
Route::resource('recommendation', RecommendationController::class);


Route::middleware('auth')->group(function () {
    Route::resource('reservation', ReservationController::class);
    Route::resource('consultation', ConsultationController::class);
    Route::resource('res_consultation', ResConsultationController::class);
    Route::resource('user_consultation', UserConsultationController::class);

    Route::get('admin/dashboard', AdminController::class)->name('admin.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
