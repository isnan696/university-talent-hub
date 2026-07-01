<?php

namespace App\Services;

use App\Models\Reward;
use App\Models\RewardClaim;
use App\Models\StudentProfile;
use App\Repositories\Interfaces\RewardRepositoryInterface;

class RewardClaimService
{
    public function __construct(
        private RewardRepositoryInterface $rewardRepository,
        private PointService $pointService,
    ) {}

    public function claim(StudentProfile $profile, string $rewardId): RewardClaim
    {
        $reward = $this->rewardRepository->findById($rewardId);

        if (!$reward->isAvailable()) {
            throw new \Exception('Reward tidak tersedia atau stok habis.');
        }

        $point = $this->pointService->getOrCreatePoint($profile);
        if ($point->total_points < $reward->required_points) {
            throw new \Exception('Poin tidak mencukupi.');
        }

        $claim = RewardClaim::create([
            'student_profile_id' => $profile->id,
            'reward_id' => $reward->id,
            'used_points' => $reward->required_points,
            'status' => 'approved',
            'claimed_at' => now(),
        ]);

        $this->pointService->deductPoints(
            $profile,
            $reward->required_points,
            'Reward',
            $reward->id,
            "Claim reward: {$reward->title}"
        );

        $this->rewardRepository->decrementStock($reward->id);

        return $claim;
    }

    public function getHistory(StudentProfile $profile)
    {
        return RewardClaim::where('student_profile_id', $profile->id)
            ->with('reward')
            ->orderByDesc('created_at')
            ->get();
    }
}
