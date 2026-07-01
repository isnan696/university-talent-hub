<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use Illuminate\Http\JsonResponse;

class LeaderboardController extends Controller
{
    public function __construct(private StudentRepositoryInterface $studentRepository) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->studentRepository->getLeaderboard(),
        ]);
    }
}
