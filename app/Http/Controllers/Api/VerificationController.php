<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Repositories\Interfaces\VerificationRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function __construct(
        private VerificationRepositoryInterface $verificationRepository,
        private StudentRepositoryInterface $studentRepository,
    ) {}

    public function index(): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        return response()->json([
            'success' => true,
            'data' => $this->verificationRepository->getHistory($profile->id),
        ]);
    }
}
