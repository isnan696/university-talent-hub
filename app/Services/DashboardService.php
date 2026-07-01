<?php

namespace App\Services;

use App\Models\User;
use App\Models\Skill;
use App\Models\Certificate;
use App\Models\Portfolio;
use App\Models\Verification;
use App\Models\Reward;
use App\Models\Opportunity;
use App\Models\RewardClaim;
use App\Repositories\Interfaces\StudentRepositoryInterface;

class DashboardService
{
    public function __construct(
        private StudentRepositoryInterface $studentRepository,
        private RecommendationService $recommendationService,
        private PointService $pointService,
    ) {}

    public function getStudentDashboard(User $user)
    {
        $profile = $user->studentProfile;
        if (!$profile) {
            return null;
        }

        $profile->load(['skills', 'certificates', 'portfolios', 'point']);

        return [
            'profile' => $profile,
            'points' => $profile->point,
            'skills_count' => $profile->skills->count(),
            'certificates_count' => $profile->certificates->count(),
            'portfolios_count' => $profile->portfolios->count(),
            'pending_count' => $profile->skills->where('verification_status', 'pending')->count()
                + $profile->certificates->where('verification_status', 'pending')->count()
                + $profile->portfolios->where('verification_status', 'pending')->count(),
            'recommendations' => $this->recommendationService->getActiveForStudent($profile),
            'ranking' => $this->getStudentRanking($profile),
        ];
    }

    public function getAdminDashboard()
    {
        return [
            'total_students' => User::where('role', 'student')->count(),
            'total_skills' => Skill::count(),
            'total_certificates' => Certificate::count(),
            'total_portfolios' => Portfolio::count(),
            'pending_verifications' => Verification::where('status', 'pending')->count(),
            'active_rewards' => Reward::where('status', 'active')->count(),
            'active_opportunities' => Opportunity::where('status', 'active')->count(),
            'recent_claims' => RewardClaim::with('studentProfile.user', 'reward')
                ->latest()
                ->take(5)
                ->get(),
        ];
    }

    private function getStudentRanking($profile): ?int
    {
        if (!$profile->point) return null;

        $rank = \DB::table('points')
            ->where('total_points', '>', $profile->point->total_points)
            ->count();

        return $rank + 1;
    }
}
