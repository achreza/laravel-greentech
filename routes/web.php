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
use App\Http\Controllers\ParticipantPaymentController;
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

        Route::get('/admin/detail/{id}', [DashboardController::class, 'detail']);
        Route::get('/admin/edit/{id}', [DashboardController::class, 'editAdmin'])->name('detail-admin');
        Route::get('/admin/detail/download/{file_name}', [SubmissionController::class, 'download'])->name('admin-download-file');
        Route::post('/admin/detail/edit/{id}', [DashboardController::class, 'paymentConfirm'])->name('payment-confirm');


        Route::get('/admin/system', function () {
            return view('admin.system', [
                'page' => 'content',
            ]);
        });
        Route::post('/admin/system/update', [SubmissionController::class, 'systemStatus'])->name('update-system');

        Route::get('/admin/participant', [DashboardController::class, 'participant'])->name('admin-participant');
        Route::get('/admin/participant/{id}', [DashboardController::class, 'participantDetail'])->name('admin-participant-detail');
        Route::post('/admin/participant/decision/{id}', [DashboardController::class, 'participantDecision'])->name('admin-participant-decision');
        Route::get('/admin/participant/download/{nama_file}', [ParticipantPaymentController::class, 'download'])->name('download-participant');

        Route::get('/admin/paper/payment', [PaperController::class, 'paperPayment']);
        Route::get('/admin/paper/payment/{id}', [PaperController::class, 'paperPaymentPage']);
        Route::post('/admin/paper/payment/post/{id}', [PaperController::class, 'paperPaymentAdmin']);






        Route::get('/admin/download/payment/{file_name}', [SubmissionController::class, 'paymentDownload']);
        Route::get('/admin/download/student_card/{file_name}', [SubmissionController::class, 'studentCardDownload']);
    });

    Route::group(['middleware' => 'reviewer'], function () {
        // Reviewer
        Route::post('/reviewer/make-decision/{id}', [SubmissionController::class, 'decision'])->name('make-decision');
        Route::get('/reviewer/edit/{id} ', [DashboardController::class, 'reviewerEdit'])->name('reviewer-edit');
        Route::get('/reviewer/detail/{id} ', [DashboardController::class, 'detail'])->name('reviewer-detail');

        Route::get('/reviewer/peer-review', [PaperController::class, 'peerReview'])->name('paper-peer-reviewer');
        Route::get('/reviewer/peer-review/{id}', [PaperController::class, 'peerReviewDetail'])->name('paper-peer-reviewer-detail');
        Route::get('/reviewer/peer-review/edit/{id}', [PaperController::class, 'peerReviewEdit'])->name('paper-peer-reviewer-edit');
        Route::post('/reviewer/peer-review/post/{id}', [PaperController::class, 'peerReviewAction'])->name('paper-peer-reviewer-action');
    });

    Route::group(['middleware' => 'presenter'], function () {
        // User
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/update-profile', [ProfileController::class, 'update'])->name('update-profile');


        Route::get('/detail/{id}', [SubmissionController::class, 'detail'])->name('detail');
        Route::get('/edit/{id}', [SubmissionController::class, 'edit'])->name('edit');
        Route::post('/detail/edit/{id}', [SubmissionController::class, 'update'])->name('edit-submission');
        Route::get('/detail/remove/{id}', [SubmissionController::class, 'destroy'])->name('remove-submission');
        Route::get('/download/{file_name}', [SubmissionController::class, 'download'])->name('download-file');

        Route::get('/submission', [SubmissionController::class, 'index'])->name('submission');
        Route::post('/submission/post_submission', [SubmissionController::class, 'store'])->name('add-submission');

        Route::get('/payment', [SubmissionController::class, 'payment'])->name('payment');
        Route::get('/payment/{id}', [SubmissionController::class, 'paymentPage'])->name('payment-page');
        Route::post('/payment/confirmation/{id}', [SubmissionController::class, 'paymentConfirmation'])->name('payment-confirmation');
        Route::get('/payment/reupload/{id}', [SubmissionController::class, 'paymentReupload'])->name('payment-reupload');
        Route::post('/payment/reupload/post/{id}', [SubmissionController::class, 'paymentReuploadAction'])->name('payment-reupload-post');

        Route::post('/payment/post_payment/{id}', [SubmissionController::class, 'paymentAction'])->name('add-payment');
        Route::get('/download/payment/{file_name}', [SubmissionController::class, 'paymentDownload'])->name('download-payment');
        Route::get('/download/student_card/{file_name}', [SubmissionController::class, 'studentCardDownload'])->name('download-studentCard');


        Route::get('/paper', [PaperController::class, 'index'])->name('paper-index');
        Route::get('/paper/{id}', [PaperController::class, 'edit'])->name('paper-edit');
        Route::post('/paper/post_paper/{id}', [PaperController::class, 'store'])->name('paper-store');

        Route::get('/peer-review', [PaperController::class, 'peerReview'])->name('paper-peer-review');
        Route::get('/peer-review/{id}', [PaperController::class, 'peerReviewDetail'])->name('paper-peer-review-detail');
        Route::get('/peer-review/edit/{id}', [PaperController::class, 'peerReviewEdit'])->name('paper-peer-review-edit');
        Route::post('/peer-review/post/{id}', [PaperController::class, 'peerReviewAction'])->name('paper-peer-review-action');

        Route::get('/paper-payment', [PaperController::class, 'paperPayment']);
        Route::get('/paper/payment/{id}', [PaperController::class, 'paperPaymentPage'])->name('paper-payment-page');
        Route::get('/paper-payment/download/{nama_file}', [PaperController::class, 'downloadPaperPayment']);
        Route::post('/paper/payment/post/{id}', [PaperController::class, 'paperPaymentAction'])->name('paper-payment-action');
    });

    Route::group(['middleware' => 'participant'], function () {
        Route::get('/dashboard-participant', [ParticipantPaymentController::class, 'index'])->name('participant-index');
        // initial
        Route::get('/participant/type', function () {
            return view('participant.option', [
                'page' => 'content'
            ]);
        });
        Route::get('/participant/reupload/{id}', [ParticipantPaymentController::class, 'reupload'])->name('participant-reupload');

        Route::post('/participant/payment', [ParticipantPaymentController::class, 'payment'])->name('participant-payment');
        Route::post('/participant/payment/post/{option}', [ParticipantPaymentController::class, 'store'])->name('participant-payment-post');

        Route::post('/participant/reupload/post/{id}', [ParticipantPaymentController::class, 'update'])->name('participant-reupload-post');

        Route::get('/participant/download/{nama_file}', [ParticipantPaymentController::class, 'download'])->name('participant-download');
    });
    Route::get('/download/paper-reviewer/{file_name}', [PaperController::class, 'downloadPeerReviewer'])->name('download-file-peer-reviewer');
    Route::get('/download/paper-presenter/{file_name}', [PaperController::class, 'downloadPeerPresenter'])->name('download-file-peer-presenter');
});

Route::get('/illegal', function () {
    return view('pages.error_page', [
        'page' => 'home',
    ]);
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');