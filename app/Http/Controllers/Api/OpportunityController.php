<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use Illuminate\Http\JsonResponse;

class OpportunityController extends Controller
{
    public function __construct(private OpportunityRepositoryInterface $opportunityRepository) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->opportunityRepository->findActive(),
        ]);
    }

    public function show(string $id): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->opportunityRepository->findById($id),
        ]);
    }
}
