<?php

use App\Http\Controllers\AbstractStatusController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
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

// initial
Route::get('/', function () {
    return view('auth.auth', [
        'page' => 'home'
    ]);
});

//auth controller
Route::get('/login/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

//register
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::group(['middleware' => 'admin'], function () {
        //admin
        Route::get('/admin/abstract-status', [AbstractStatusController::class, 'index'])->name('abstract-status');
        Route::post('/admin/abstract-status/add', [AbstractStatusController::class, 'store']);
        Route::get('/admin/abstract-status/remove/{id}', [AbstractStatusController::class, 'destroy']);

        Route::get('/admin/topic', [TopicController::class, 'index'])->name('topic');
        Route::post('/admin/topic/add', [TopicController::class, 'store']);
        Route::get('/admin/topic/remove/{id}', [TopicController::class, 'destroy']);

        Route::get('/admin/user-role', [RoleController::class, 'index'])->name('user-role');
        Route::post('/admin/user-role/add', [RoleController::class, 'store']);
        Route::get('/admin/user-role/remove/{id}', [RoleController::class, 'destroy']);

        Route::get('/admin/user-list', [UserController::class, 'index'])->name('user-list');
        Route::post('/admin/user-list/add', [UserController::class, 'store']);
        Route::get('/admin/user-list/remove/{id}', [UserController::class, 'destroy']);

        Route::get('/admin/detail/{id}', [DashboardController::class, 'detail'])->name('detail-reviewer');
        Route::get('/admin/detail/download/{nama}', [DashboardController::class, 'download'])->name('download');
        Route::post('/admin/detail/edit/{id}', [DashboardController::class, 'paymentConfirm'])->name('payment-confirm');


        Route::get('/admin/system', function () {
            return view('admin.system', [
                'page' => 'content',
            ]);
        });
        Route::post('/admin/system/update', [SubmissionController::class, 'systemStatus'])->name('update-system');
    });

    Route::group(['middleware' => 'reviewer'], function () {
        // Reviewer
        Route::post('/reviewer/make-decision/{id}', [SubmissionController::class, 'decision'])->name('make-decision');
        Route::get('/reviewer/detail/{id} ', [DashboardController::class, 'detail'])->name('reviewer-detail');
    });

    Route::group(['middleware' => 'presenter'], function () {
        // User
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/update-profile', [ProfileController::class, 'update'])->name('update-profile');

        Route::get('/detail/{id}', [SubmissionController::class, 'detail'])->name('detail');
        Route::post('/detail/edit/{id}', [SubmissionController::class, 'update'])->name('edit-submission');
        Route::get('/detail/remove/{id}', [SubmissionController::class, 'destroy'])->name('remove-submission');
        Route::get('/download/{file_name}', [SubmissionController::class, 'download'])->name('download-file');

        Route::get('/submission', [SubmissionController::class, 'index'])->name('submission');
        Route::post('/submission/post_submission', [SubmissionController::class, 'store'])->name('add-submission');

        Route::get('/payment', [SubmissionController::class, 'payment'])->name('payment');
        Route::post('/payment/post_payment', [SubmissionController::class, 'paymentAction'])->name('add-payment');
        Route::get('/download/payment/{file_name}', [SubmissionController::class, 'paymentDownload'])->name('download-payment');


        Route::get('/paper', [PaperController::class, 'index'])->name('paper-index');
        Route::get('/paper/{id}', [PaperController::class, 'edit'])->name('paper-edit');
        Route::post('/paper/post_paper', [PaperController::class, 'store'])->name('paper-store');
    });

    Route::group(['middleware' => 'participant'], function () {
    });
});

Route::get('/illegal', function () {
    return view('pages.error_page', [
        'page' => 'home',
    ]);
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');