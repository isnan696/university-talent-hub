<?php

namespace App\Repositories;

use App\Models\Skill;
use App\Repositories\Interfaces\SkillRepositoryInterface;

class SkillRepository implements SkillRepositoryInterface
{
    public function findByStudent(string $studentProfileId)
    {
        return Skill::where('student_profile_id', $studentProfileId)
            ->orderByDesc('created_at')
            ->get();
    }

    public function create(array $data)
    {
        return Skill::create($data);
    }

    public function update(string $id, array $data)
    {
        $skill = Skill::findOrFail($id);
        $skill->update($data);
        return $skill;
    }

    public function delete(string $id)
    {
        return Skill::findOrFail($id)->delete();
    }

    public function findPending()
    {
        return Skill::where('verification_status', 'pending')
            ->with('studentProfile.user')
            ->get();
    }

    public function countByStudent(string $studentProfileId)
    {
        return Skill::where('student_profile_id', $studentProfileId)->count();
    }

    public function countApprovedByStudent(string $studentProfileId)
    {
        return Skill::where('student_profile_id', $studentProfileId)
            ->where('verification_status', 'approved')
            ->count();
    }
}
