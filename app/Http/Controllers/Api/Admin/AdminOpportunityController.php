<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOpportunityController extends Controller
{
    public function __construct(private OpportunityRepositoryInterface $opportunityRepository) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->opportunityRepository->all(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'opportunity_category_id' => 'required|string',
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'location' => 'nullable|string|max:150',
            'deadline' => 'required|date',
            'registration_url' => 'nullable|url',
        ]);

        $opportunity = $this->opportunityRepository->create([
            'category' => $data['opportunity_category_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'location' => $data['location'] ?? null,
            'organizer' => '',
            'start_date' => now(),
            'end_date' => $data['deadline'],
            'registration_url' => $data['registration_url'] ?? null,
            'created_by' => Auth::id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Opportunity created successfully.',
            'data' => $opportunity,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->opportunityRepository->findById($id),
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
        ]);

        $this->opportunityRepository->update($id, $data);

        return response()->json([
            'success' => true,
            'message' => 'Opportunity updated successfully.',
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->opportunityRepository->delete($id);
        return response()->json([
            'success' => true,
            'message' => 'Opportunity deleted successfully.',
        ]);
    }
}
