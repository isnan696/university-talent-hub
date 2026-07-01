<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\Api\PointController;
use App\Http\Controllers\Api\RewardController;
use App\Http\Controllers\Api\OpportunityController;
use App\Http\Controllers\Api\RecommendationController;
use App\Http\Controllers\Api\LeaderboardController;
use App\Http\Controllers\Api\Admin\AdminDashboardController;
use App\Http\Controllers\Api\Admin\AdminVerificationController;
use App\Http\Controllers\Api\Admin\AdminRewardController;
use App\Http\Controllers\Api\Admin\AdminOpportunityController;
use App\Http\Controllers\Api\Admin\StudentManagementController;

Route::prefix('v1')->group(function () {
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::get('/profile', [ProfileController::class, 'show']);
        Route::put('/profile', [ProfileController::class, 'update']);

        Route::apiResource('/skills', SkillController::class);
        Route::post('/skills/{id}/submit', [SkillController::class, 'submit']);

        Route::apiResource('/certificates', CertificateController::class);
        Route::post('/certificates/{id}/submit', [CertificateController::class, 'submit']);

        Route::apiResource('/portfolios', PortfolioController::class);
        Route::post('/portfolios/{id}/submit', [PortfolioController::class, 'submit']);

        Route::get('/verifications', [VerificationController::class, 'index']);

        Route::get('/points', [PointController::class, 'index']);
        Route::get('/points/history', [PointController::class, 'history']);

        Route::get('/rewards', [RewardController::class, 'index']);
        Route::post('/rewards/{id}/claim', [RewardController::class, 'claim']);
        Route::get('/reward-claims', [RewardController::class, 'history']);

        Route::get('/opportunities', [OpportunityController::class, 'index']);
        Route::get('/opportunities/{id}', [OpportunityController::class, 'show']);

        Route::get('/recommendations', [RecommendationController::class, 'index']);

        Route::get('/leaderboard', [LeaderboardController::class, 'index']);

        Route::prefix('admin')->middleware('admin')->group(function () {
            Route::get('/dashboard', [AdminDashboardController::class, 'index']);
            Route::get('/students', [StudentManagementController::class, 'index']);
            Route::get('/students/search', [StudentManagementController::class, 'search']);
            Route::get('/students/{id}', [StudentManagementController::class, 'show']);

            Route::get('/verifications', [AdminVerificationController::class, 'index']);
            Route::get('/verifications/{id}', [AdminVerificationController::class, 'show']);
            Route::patch('/verifications/{id}/approve', [AdminVerificationController::class, 'approve']);
            Route::patch('/verifications/{id}/reject', [AdminVerificationController::class, 'reject']);

            Route::apiResource('/rewards', AdminRewardController::class);
            Route::apiResource('/opportunities', AdminOpportunityController::class);
        });
    });
});
