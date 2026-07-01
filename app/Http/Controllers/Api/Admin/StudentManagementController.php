<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use Illuminate\Http\JsonResponse;

class StudentManagementController extends Controller
{
    public function __construct(private StudentRepositoryInterface $studentRepository) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->studentRepository->getAllWithPoints(),
        ]);
    }

    public function search(): JsonResponse
    {
        $filters = request()->only(['name', 'program_studi', 'skill', 'point_min']);
        return response()->json([
            'success' => true,
            'data' => $this->studentRepository->search($filters),
        ]);
    }

    public function show(string $id): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->studentRepository->findWithUser($id),
        ]);
    }
}
