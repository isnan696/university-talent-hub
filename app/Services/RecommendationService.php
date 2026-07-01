<?php

namespace App\Services;

use App\Models\AiRecommendation;
use App\Models\StudentProfile;

class RecommendationService
{
    public function generateForStudent(StudentProfile $profile): void
    {
        $profile->load('skills', 'certificates', 'portfolios', 'point');

        $recommendations = [];
        $profileCompletion = $profile->calculateCompletion();
        $skillCount = $profile->skills->where('verification_status', 'approved')->count();
        $certCount = $profile->certificates->where('verification_status', 'approved')->count();
        $portfolioCount = $profile->portfolios->where('verification_status', 'approved')->count();
        $totalPoints = $profile->point?->total_points ?? 0;

        if ($profileCompletion < 80) {
            $recommendations[] = [
                'type' => 'Profile',
                'title' => 'Lengkapi Profil Talent',
                'description' => 'Lengkapi data profil agar mencapai 100% completion.',
                'priority' => 1,
                'score' => $profileCompletion < 50 ? 30 : 20,
            ];
        }

        if ($skillCount < 3) {
            $recommendations[] = [
                'type' => 'Skill',
                'title' => 'Tambah Skill Baru',
                'description' => 'Tambahkan minimal 3 skill yang sudah terverifikasi untuk meningkatkan profil.',
                'priority' => 2,
                'score' => $skillCount < 1 ? 30 : 20,
            ];
        }

        if ($certCount === 0) {
            $recommendations[] = [
                'type' => 'Certificate',
                'title' => 'Ikuti Sertifikasi Online',
                'description' => 'Sertifikasi akan menambah kredibilitas dan poin Anda.',
                'priority' => 3,
                'score' => 25,
            ];
        }

        if ($portfolioCount === 0) {
            $recommendations[] = [
                'type' => 'Portfolio',
                'title' => 'Buat Portfolio Pertama',
                'description' => 'Unggah proyek untuk menunjukkan implementasi skill Anda.',
                'priority' => 4,
                'score' => 25,
            ];
        }

        if ($totalPoints < 20) {
            $recommendations[] = [
                'type' => 'Point',
                'title' => 'Kumpulkan Lebih Banyak Poin',
                'description' => 'Lengkapi skill, sertifikat, dan portfolio untuk mengumpulkan poin.',
                'priority' => 5,
                'score' => 20,
            ];
        }

        if ($totalPoints >= 100) {
            $recommendations[] = [
                'type' => 'Reward',
                'title' => 'Klaim Reward Tersedia',
                'description' => 'Anda memiliki cukup poin untuk menukarkan reward!',
                'priority' => 6,
                'score' => 10,
            ];
        }

        $hasLaravel = $profile->skills->contains(fn($s) => stripos($s->skill_name, 'Laravel') !== false);
        $hasRestApi = $profile->skills->contains(fn($s) => stripos($s->skill_name, 'REST API') !== false);
        if ($hasLaravel && !$hasRestApi) {
            $recommendations[] = [
                'type' => 'Skill',
                'title' => 'Pelajari REST API Development',
                'description' => 'REST API adalah skill penting untuk backend developer.',
                'priority' => 7,
                'score' => 15,
            ];
        }

        $hasPython = $profile->skills->contains(fn($s) => stripos($s->skill_name, 'Python') !== false);
        $hasML = $profile->skills->contains(fn($s) => stripos($s->skill_name, 'Machine Learning') !== false);
        if ($hasPython && !$hasML) {
            $recommendations[] = [
                'type' => 'Skill',
                'title' => 'Pelajari Machine Learning',
                'description' => 'Kombinasikan Python Anda dengan Machine Learning.',
                'priority' => 8,
                'score' => 15,
            ];
        }

        usort($recommendations, fn($a, $b) => $b['score'] <=> $a['score']);
        $recommendations = array_slice($recommendations, 0, 5);

        AiRecommendation::where('student_profile_id', $profile->id)
            ->where('status', 'active')
            ->update(['status' => 'dismissed']);

        foreach ($recommendations as $rec) {
            AiRecommendation::create([
                'student_profile_id' => $profile->id,
                'recommendation_type' => $rec['type'],
                'title' => $rec['title'],
                'description' => $rec['description'],
                'priority' => $rec['priority'],
                'status' => 'active',
                'generated_at' => now(),
            ]);
        }
    }

    public function getActiveForStudent(StudentProfile $profile)
    {
        return AiRecommendation::where('student_profile_id', $profile->id)
            ->where('status', 'active')
            ->orderBy('priority')
            ->get();
    }

    public function generateForAllStudents(): void
    {
        StudentProfile::chunk(50, function ($profiles) {
            foreach ($profiles as $profile) {
                $this->generateForStudent($profile);
            }
        });
    }
}
