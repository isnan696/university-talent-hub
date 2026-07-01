<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Services\RecommendationService;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    public function __construct(
        private RecommendationService $recommendationService,
        private StudentRepositoryInterface $studentRepository,
    ) {}

    public function index()
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $recommendations = $this->recommendationService->getActiveForStudent($profile);
        return view('student.recommendations', compact('recommendations'));
    }
}
