<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Verification;
use App\Repositories\Interfaces\SkillRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Services\ActivityLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function __construct(
        private SkillRepositoryInterface $skillRepository,
        private StudentRepositoryInterface $studentRepository,
        private ActivityLogService $activityLogService,
    ) {}

    public function index()
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $skills = $this->skillRepository->findByStudent($profile->id);
        return view('student.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('student.skills.create');
    }

    public function store(Request $request)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());

        $data = $request->validate([
            'skill_name' => 'required|string|max:100',
            'category' => 'nullable|string|max:50',
            'level' => 'required|in:Beginner,Intermediate,Advanced',
            'description' => 'nullable|string|max:500',
        ]);

        $skill = $this->skillRepository->create([
            'student_profile_id' => $profile->id,
            'skill_name' => $data['skill_name'],
            'category' => $data['category'] ?? 'General',
            'level' => $data['level'],
            'description' => $data['description'],
            'verification_status' => 'draft',
        ]);

        $this->activityLogService->log(
            Auth::id(),
            'Add Skill',
            'Skill',
            "Added skill: {$skill->skill_name}",
            $request
        );

        return redirect()->route('student.skills.index')->with('success', 'Skill berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $skill = $this->skillRepository->findByStudent(
            $this->studentRepository->findByUserId(Auth::id())->id
        )->find($id);

        abort_if(!$skill, 404);

        return view('student.skills.edit', compact('skill'));
    }

    public function update(Request $request, string $id)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $skill = $profile->skills()->findOrFail($id);

        $data = $request->validate([
            'skill_name' => 'required|string|max:100',
            'category' => 'nullable|string|max:50',
            'level' => 'required|in:Beginner,Intermediate,Advanced',
            'description' => 'nullable|string|max:500',
        ]);

        $this->skillRepository->update($id, $data);

        return redirect()->route('student.skills.index')->with('success', 'Skill berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $profile->skills()->findOrFail($id)->delete();

        return redirect()->route('student.skills.index')->with('success', 'Skill berhasil dihapus.');
    }

    public function submit(string $id)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $skill = $profile->skills()->findOrFail($id);

        $skill->update(['verification_status' => 'pending']);

        Verification::create([
            'student_profile_id' => $profile->id,
            'verifiable_type' => get_class($skill),
            'verifiable_id' => $skill->id,
            'status' => 'pending',
        ]);

        return redirect()->route('student.skills.index')->with('success', 'Skill berhasil dikirim untuk verifikasi.');
    }
}
