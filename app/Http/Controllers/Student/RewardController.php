<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\RewardRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Services\ActivityLogService;
use App\Services\RewardClaimService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RewardController extends Controller
{
    public function __construct(
        private RewardRepositoryInterface $rewardRepository,
        private StudentRepositoryInterface $studentRepository,
        private RewardClaimService $rewardClaimService,
        private ActivityLogService $activityLogService,
    ) {}

    public function index()
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $rewards = $this->rewardRepository->findActive();
        $point = $profile->point;
        $history = $this->rewardClaimService->getHistory($profile);
        return view('student.rewards.index', compact('rewards', 'point', 'history'));
    }

    public function claim(Request $request, string $id)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());

        try {
            $claim = $this->rewardClaimService->claim($profile, $id);

            $this->activityLogService->log(
                Auth::id(),
                'Claim Reward',
                'Reward',
                "Claimed reward: {$claim->reward->title}",
                $request
            );

            return redirect()->route('student.rewards.index')->with('success', 'Reward berhasil diklaim!');
        } catch (\Exception $e) {
            return redirect()->route('student.rewards.index')->with('error', $e->getMessage());
        }
    }

    public function history()
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $history = $this->rewardClaimService->getHistory($profile);
        return view('student.rewards.history', compact('history'));
    }
}
