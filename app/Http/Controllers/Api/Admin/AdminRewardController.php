<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\RewardRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminRewardController extends Controller
{
    public function __construct(private RewardRepositoryInterface $rewardRepository) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->rewardRepository->all(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'reward_category_id' => 'required|exists:reward_categories,id',
            'reward_name' => 'required|string|max:150',
            'required_points' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $reward = $this->rewardRepository->create([
            'category_id' => $data['reward_category_id'],
            'title' => $data['reward_name'],
            'required_points' => $data['required_points'],
            'stock' => $data['stock'],
            'image' => $request->file('reward_image')?->store('rewards', 'public'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Reward created successfully.',
            'data' => $reward,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->rewardRepository->findById($id),
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $data = $request->validate([
            'reward_name' => 'required|string|max:150',
            'required_points' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        $this->rewardRepository->update($id, [
            'title' => $data['reward_name'],
            'required_points' => $data['required_points'],
            'stock' => $data['stock'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Reward updated successfully.',
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->rewardRepository->delete($id);
        return response()->json([
            'success' => true,
            'message' => 'Reward deleted successfully.',
        ]);
    }
}
