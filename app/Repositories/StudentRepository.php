<?php

namespace App\Repositories;

use App\Models\Point;
use App\Models\StudentProfile;
use App\Models\User;
use App\Repositories\Interfaces\StudentRepositoryInterface;

class StudentRepository implements StudentRepositoryInterface
{
    public function findByUserId(string $userId)
    {
        return StudentProfile::where('user_id', $userId)->first();
    }

    public function findWithUser(string $id)
    {
        return StudentProfile::with('user', 'point', 'skills', 'certificates', 'portfolios')
            ->findOrFail($id);
    }

    public function search(array $filters)
    {
        $query = StudentProfile::with(['user', 'point']);

        if (!empty($filters['name'])) {
            $query->whereHas('user', function ($q) use ($filters) {
                $q->where('name', 'like', "%{$filters['name']}%");
            });
        }

        if (!empty($filters['program_studi'])) {
            $query->where('program_studi', 'like', "%{$filters['program_studi']}%");
        }

        if (!empty($filters['skill'])) {
            $query->whereHas('skills', function ($q) use ($filters) {
                $q->where('skill_name', 'like', "%{$filters['skill']}%")
                  ->where('verification_status', 'approved');
            });
        }

        if (!empty($filters['point_min'])) {
            $query->whereHas('point', function ($q) use ($filters) {
                $q->where('total_points', '>=', (int) $filters['point_min']);
            });
        }

        return $query->paginate(10);
    }

    public function getAllWithPoints()
    {
        return StudentProfile::with('user', 'point')
            ->leftJoin('points', 'student_profiles.id', '=', 'points.student_profile_id')
            ->orderByDesc('points.total_points')
            ->select('student_profiles.*')
            ->paginate(20);
    }

    public function getLeaderboard(int $limit = 20)
    {
        return StudentProfile::with('user')
            ->whereHas('point')
            ->join('points', 'student_profiles.id', '=', 'points.student_profile_id')
            ->orderByDesc('points.total_points')
            ->select('student_profiles.*', 'points.total_points')
            ->take($limit)
            ->get();
    }

    public function updateProfile(string $id, array $data)
    {
        $profile = StudentProfile::findOrFail($id);
        $profile->update($data);
        $profile->profile_completion = $profile->calculateCompletion();
        $profile->save();
        return $profile;
    }

    public function getDashboardStats()
    {
        return [
            'total_students' => User::where('role', 'student')->count(),
            'total_skills' => \App\Models\Skill::count(),
            'total_certificates' => \App\Models\Certificate::count(),
            'total_portfolios' => \App\Models\Portfolio::count(),
            'pending_verifications' => \App\Models\Verification::where('status', 'pending')->count(),
        ];
    }

    public function countStudents()
    {
        return User::where('role', 'student')->count();
    }
}
