<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Verification;
use App\Repositories\Interfaces\PortfolioRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function __construct(
        private PortfolioRepositoryInterface $portfolioRepository,
        private StudentRepositoryInterface $studentRepository,
    ) {}

    public function index(): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        return response()->json([
            'success' => true,
            'data' => $this->portfolioRepository->findByStudent($profile->id),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());

        $data = $request->validate([
            'project_title' => 'required|string|max:200',
            'description' => 'required|string|max:2000',
            'github_url' => 'nullable|url|max:255',
            'demo_url' => 'nullable|url|max:255',
        ]);

        $portfolio = $this->portfolioRepository->create([
            'student_profile_id' => $profile->id,
            'project_title' => $data['project_title'],
            'project_description' => $data['description'],
            'project_url' => $data['demo_url'] ?? null,
            'github_url' => $data['github_url'] ?? null,
            'thumbnail' => $request->file('portfolio_image')?->store('portfolios', 'public'),
            'verification_status' => 'draft',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Portfolio created successfully',
            'data' => $portfolio,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $portfolio = $profile->portfolios()->findOrFail($id);
        return response()->json(['success' => true, 'data' => $portfolio]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $profile->portfolios()->findOrFail($id);

        $data = $request->validate([
            'project_title' => 'required|string|max:200',
            'description' => 'required|string|max:2000',
        ]);

        $this->portfolioRepository->update($id, $data);
        return response()->json(['success' => true, 'message' => 'Portfolio updated successfully']);
    }

    public function destroy(string $id): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $profile->portfolios()->findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Portfolio deleted successfully']);
    }

    public function submit(string $id): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $portfolio = $profile->portfolios()->findOrFail($id);
        $portfolio->update(['verification_status' => 'pending']);

        Verification::create([
            'student_profile_id' => $profile->id,
            'verifiable_type' => get_class($portfolio),
            'verifiable_id' => $portfolio->id,
            'status' => 'pending',
        ]);

        return response()->json(['success' => true, 'message' => 'Portfolio submitted for verification']);
    }
}
