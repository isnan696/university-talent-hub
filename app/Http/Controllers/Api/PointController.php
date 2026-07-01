<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Services\PointService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{
    public function __construct(
        private PointService $pointService,
        private StudentRepositoryInterface $studentRepository,
    ) {}

    public function index(): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $point = $this->pointService->getOrCreatePoint($profile);

        return response()->json([
            'success' => true,
            'data' => ['total_points' => $point->total_points],
        ]);
    }

    public function history(): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        return response()->json([
            'success' => true,
            'data' => $this->pointService->getHistory($profile),
        ]);
    }
}
