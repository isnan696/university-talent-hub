<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Verification;
use App\Repositories\Interfaces\SkillRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Services\ActivityLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function __construct(
        private SkillRepositoryInterface $skillRepository,
        private StudentRepositoryInterface $studentRepository,
        private ActivityLogService $activityLogService,
    ) {}

    public function index(): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        return response()->json([
            'success' => true,
            'data' => $this->skillRepository->findByStudent($profile->id),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());

        $data = $request->validate([
            'skill_name' => 'required|string|max:100',
            'category' => 'nullable|string|max:50',
            'level' => 'required|in:Beginner,Intermediate,Advanced',
            'description' => 'nullable|string|max:500',
        ]);

        $skill = $this->skillRepository->create([
            'student_profile_id' => $profile->id,
            'skill_name' => $data['skill_name'],
            'category' => $data['category'] ?? 'General',
            'level' => $data['level'],
            'description' => $data['description'] ?? null,
            'verification_status' => 'draft',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Skill created successfully',
            'data' => $skill,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $skill = $profile->skills()->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $skill,
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $profile->skills()->findOrFail($id);

        $data = $request->validate([
            'skill_name' => 'required|string|max:100',
            'category' => 'nullable|string|max:50',
            'level' => 'required|in:Beginner,Intermediate,Advanced',
            'description' => 'nullable|string|max:500',
        ]);

        $this->skillRepository->update($id, $data);

        return response()->json([
            'success' => true,
            'message' => 'Skill updated successfully',
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $profile->skills()->findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Skill deleted successfully',
        ]);
    }

    public function submit(string $id): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $skill = $profile->skills()->findOrFail($id);

        $skill->update(['verification_status' => 'pending']);

        Verification::create([
            'student_profile_id' => $profile->id,
            'verifiable_type' => get_class($skill),
            'verifiable_id' => $skill->id,
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Skill submitted for verification',
        ]);
    }
}
