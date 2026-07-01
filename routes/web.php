<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\SkillController;
use App\Http\Controllers\Student\CertificateController;
use App\Http\Controllers\Student\PortfolioController;
use App\Http\Controllers\Student\RewardController;
use App\Http\Controllers\Student\LeaderboardController;
use App\Http\Controllers\Student\RecommendationController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\VerificationController;
use App\Http\Controllers\Admin\AdminRewardController;
use App\Http\Controllers\Admin\OpportunityController;
use App\Http\Controllers\Admin\StudentManagementController;
use App\Http\Controllers\Admin\LeaderboardController as AdminLeaderboardController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('student')->name('student.')->middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/profile/photo', [ProfileController::class, 'uploadPhoto'])->name('profile.photo');

        Route::resource('skills', SkillController::class)->except(['show']);
        Route::post('/skills/{id}/submit', [SkillController::class, 'submit'])->name('skills.submit');

        Route::resource('certificates', CertificateController::class)->except(['show']);
        Route::post('/certificates/{id}/submit', [CertificateController::class, 'submit'])->name('certificates.submit');

        Route::resource('portfolios', PortfolioController::class)->except(['show']);
        Route::post('/portfolios/{id}/submit', [PortfolioController::class, 'submit'])->name('portfolios.submit');

        Route::get('/rewards', [RewardController::class, 'index'])->name('rewards.index');
        Route::post('/rewards/{id}/claim', [RewardController::class, 'claim'])->name('rewards.claim');
        Route::get('/rewards/history', [RewardController::class, 'history'])->name('rewards.history');

        Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');
        Route::get('/recommendations', [RecommendationController::class, 'index'])->name('recommendations');
    });
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/students', [StudentManagementController::class, 'index'])->name('students.index');
    Route::get('/students/search', [StudentManagementController::class, 'search'])->name('students.search');
    Route::get('/students/{id}', [StudentManagementController::class, 'show'])->name('students.show');

    Route::get('/verifications', [VerificationController::class, 'index'])->name('verifications.index');
    Route::get('/verifications/{id}', [VerificationController::class, 'show'])->name('verifications.show');
    Route::patch('/verifications/{id}/approve', [VerificationController::class, 'approve'])->name('verifications.approve');
    Route::patch('/verifications/{id}/reject', [VerificationController::class, 'reject'])->name('verifications.reject');

    Route::resource('rewards', AdminRewardController::class)->except(['show']);
    Route::resource('opportunities', OpportunityController::class)->except(['show']);

    Route::get('/leaderboard', [AdminLeaderboardController::class, 'index'])->name('leaderboard');
});

Route::get('/test', function () {
    return view('layouts.app');
});
