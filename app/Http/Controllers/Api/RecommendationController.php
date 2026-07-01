<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Services\RecommendationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    public function __construct(
        private RecommendationService $recommendationService,
        private StudentRepositoryInterface $studentRepository,
    ) {}

    public function index(): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $recommendations = $this->recommendationService->getActiveForStudent($profile);

        return response()->json([
            'success' => true,
            'data' => $recommendations,
        ]);
    }
}
