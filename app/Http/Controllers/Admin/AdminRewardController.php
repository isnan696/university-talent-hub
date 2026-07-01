<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RewardCategory;
use App\Repositories\Interfaces\RewardRepositoryInterface;
use App\Services\ActivityLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminRewardController extends Controller
{
    public function __construct(
        private RewardRepositoryInterface $rewardRepository,
        private ActivityLogService $activityLogService,
    ) {}

    public function index()
    {
        $rewards = $this->rewardRepository->all();
        return view('admin.rewards.index', compact('rewards'));
    }

    public function create()
    {
        $categories = RewardCategory::all();
        return view('admin.rewards.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:reward_categories,id',
            'title' => 'required|string|max:150',
            'description' => 'nullable|string|max:1000',
            'required_points' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('rewards', 'public');
        }

        $reward = $this->rewardRepository->create($data);

        $this->activityLogService->log(
            Auth::id(),
            'Create Reward',
            'Reward',
            "Created reward: {$reward->title}",
            $request
        );

        return redirect()->route('admin.rewards.index')->with('success', 'Reward berhasil dibuat.');
    }

    public function edit(string $id)
    {
        $reward = $this->rewardRepository->findById($id);
        $categories = RewardCategory::all();
        return view('admin.rewards.edit', compact('reward', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:reward_categories,id',
            'title' => 'required|string|max:150',
            'description' => 'nullable|string|max:1000',
            'required_points' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $reward = $this->rewardRepository->findById($id);
            if ($reward->image) {
                Storage::disk('public')->delete($reward->image);
            }
            $data['image'] = $request->file('image')->store('rewards', 'public');
        }

        $this->rewardRepository->update($id, $data);

        return redirect()->route('admin.rewards.index')->with('success', 'Reward berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $reward = $this->rewardRepository->findById($id);
        if ($reward->image) {
            Storage::disk('public')->delete($reward->image);
        }
        $this->rewardRepository->delete($id);

        return redirect()->route('admin.rewards.index')->with('success', 'Reward berhasil dihapus.');
    }
}
