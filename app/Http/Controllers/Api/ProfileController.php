<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(private StudentRepositoryInterface $studentRepository) {}

    public function show(): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());

        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'Profile not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $profile->load('user'),
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());

        $data = $request->validate([
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
            'github_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
        ]);

        $this->studentRepository->updateProfile($profile->id, $data);

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
        ]);
    }
}
