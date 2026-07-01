<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\VerificationRepositoryInterface;
use App\Services\VerificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminVerificationController extends Controller
{
    public function __construct(
        private VerificationRepositoryInterface $verificationRepository,
        private VerificationService $verificationService,
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->verificationRepository->findPending(),
        ]);
    }

    public function show(string $id): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->verificationRepository->findById($id),
        ]);
    }

    public function approve(Request $request, string $id): JsonResponse
    {
        $data = $request->validate(['notes' => 'nullable|string|max:500']);
        $this->verificationService->approve($id, Auth::id(), $data['notes'] ?? null);

        return response()->json([
            'success' => true,
            'message' => 'Verification approved successfully.',
        ]);
    }

    public function reject(Request $request, string $id): JsonResponse
    {
        $data = $request->validate(['notes' => 'nullable|string|max:500']);
        $this->verificationService->reject($id, Auth::id(), $data['notes'] ?? null);

        return response()->json([
            'success' => true,
            'message' => 'Verification rejected successfully.',
        ]);
    }
}
