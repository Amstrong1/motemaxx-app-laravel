<?php

use App\Models\User;
use App\Models\Motivation;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MotivationController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\AdvertisementController;
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

Route::get('/migrate', function () {
    Artisan::call('migrate');
    dd('migrated!');
});

Route::get('reboot', function () {
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    dd('All done!');
});

Route::get('/', WelcomeController::class)->name('welcome');
Route::post('/mail', [WelcomeController::class, 'mail'])->name('mail');

Route::get('/coming_soon', function () {
    return view('coming-soon');
})->name('coming_soon');

Route::get('/appiphone', function () {
    $motivation = Motivation::where('publication_date', '<=', date('Y-m-d'))->orderBy('id', 'desc')->first();
    $advertisements = Advertisement::where('show', true)->orderBy('id', 'desc')->limit(3)->get();
    return view('dashboard', compact('motivation', 'advertisements'));
})->middleware(['auth', 'verified'])->name('appiphone');

Route::resource('prestation', PrestationController::class);

Route::resource('motivation', MotivationController::class);
Route::resource('advertisement', AdvertisementController::class);
Route::resource('recommendation', RecommendationController::class);


Route::middleware('auth')->group(function () {

    Route::get('error', [PaymentController::class, 'error']);
    Route::get('success', [PaymentController::class, 'success']);
    Route::post('pay', [PaymentController::class, 'pay'])->name('payment');

    Route::post('/markAsRead', function () {
        if (Auth::user()->admin == 'true') {
            $admins = User::where('admin', true)->get();
            foreach ($admins as $admin) {
                foreach ($admin->unreadNotifications as $notification) {
                    $notification->markAsRead();
                }
            }
        } else {
            foreach (Auth::user()->unreadNotifications as $notification) {
                $notification->markAsRead();
            }
        }

        return back();
    })->name('markAsRead');

    Route::match(['get', 'post'], 'reservation/paid/{id}', [ReservationController::class, 'paid'])->name('reservation.paid');
    Route::resource('user', UserController::class);
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
