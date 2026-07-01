<?php

namespace App\Services;

use App\Models\Point;
use App\Models\PointHistory;
use App\Models\StudentProfile;

class PointService
{
    public function getOrCreatePoint(StudentProfile $profile): Point
    {
        return Point::firstOrCreate(
            ['student_profile_id' => $profile->id],
            ['total_points' => 0, 'last_updated' => now()]
        );
    }

    public function addPoints(StudentProfile $profile, int $amount, string $sourceType, ?string $sourceId = null, ?string $description = null): Point
    {
        $point = $this->getOrCreatePoint($profile);
        $point->addPoints($amount);

        PointHistory::create([
            'student_profile_id' => $profile->id,
            'source_type' => $sourceType,
            'source_id' => $sourceId,
            'point_change' => $amount,
            'description' => $description ?? "Mendapat $amount poin",
            'created_at' => now(),
        ]);

        return $point;
    }

    public function deductPoints(StudentProfile $profile, int $amount, string $sourceType, ?string $sourceId = null, ?string $description = null): Point
    {
        $point = $this->getOrCreatePoint($profile);

        if ($point->total_points < $amount) {
            throw new \Exception('Insufficient points');
        }

        $point->deductPoints($amount);

        PointHistory::create([
            'student_profile_id' => $profile->id,
            'source_type' => $sourceType,
            'source_id' => $sourceId,
            'point_change' => -$amount,
            'description' => $description ?? "Menggunakan $amount poin",
            'created_at' => now(),
        ]);

        return $point;
    }

    public function calculateSkillPoints(string $level): int
    {
        return match ($level) {
            'Advanced' => 30,
            'Intermediate' => 20,
            default => 10,
        };
    }

    public function calculateCertificatePoints(): int
    {
        return 25;
    }

    public function calculatePortfolioPoints(): int
    {
        return 40;
    }

    public function getHistory(StudentProfile $profile)
    {
        return PointHistory::where('student_profile_id', $profile->id)
            ->orderByDesc('created_at')
            ->get();
    }
}
