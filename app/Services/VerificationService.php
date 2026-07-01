<?php

namespace App\Services;

use App\Models\StudentProfile;
use App\Models\Verification;
use App\Repositories\Interfaces\VerificationRepositoryInterface;

class VerificationService
{
    public function __construct(
        private VerificationRepositoryInterface $verificationRepository,
        private PointService $pointService,
        private RecommendationService $recommendationService,
    ) {}

    public function approve(string $id, string $adminId, ?string $notes = null): Verification
    {
        $verification = $this->verificationRepository->updateStatus($id, 'approved', $adminId, $notes);
        $profile = $verification->studentProfile;

        $points = $this->calculatePoints($verification);
        if ($points > 0) {
            $this->pointService->addPoints(
                $profile,
                $points,
                $verification->verifiable_type,
                $verification->verifiable_id,
                "{$verification->verifiable_type} approved"
            );
        }

        $this->recommendationService->generateForStudent($profile);

        return $verification;
    }

    public function reject(string $id, string $adminId, ?string $notes = null): Verification
    {
        return $this->verificationRepository->updateStatus($id, 'rejected', $adminId, $notes);
    }

    private function calculatePoints(Verification $verification): int
    {
        $type = $verification->verifiable_type;

        if (str_contains($type, 'Skill')) {
            $skill = $verification->verifiable;
            return $this->pointService->calculateSkillPoints($skill?->level ?? 'Beginner');
        }

        if (str_contains($type, 'Certificate')) {
            return $this->pointService->calculateCertificatePoints();
        }

        if (str_contains($type, 'Portfolio')) {
            return $this->pointService->calculatePortfolioPoints();
        }

        return 0;
    }
}
