<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\RewardRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Services\RewardClaimService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RewardController extends Controller
{
    public function __construct(
        private RewardRepositoryInterface $rewardRepository,
        private StudentRepositoryInterface $studentRepository,
        private RewardClaimService $rewardClaimService,
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->rewardRepository->findActive(),
        ]);
    }

    public function claim(Request $request, string $id): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());

        try {
            $claim = $this->rewardClaimService->claim($profile, $id);
            return response()->json([
                'success' => true,
                'message' => 'Reward claimed successfully',
                'data' => $claim,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function history(): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        return response()->json([
            'success' => true,
            'data' => $this->rewardClaimService->getHistory($profile),
        ]);
    }
}
