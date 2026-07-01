<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Services\ActivityLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct(
        private StudentRepositoryInterface $studentRepository,
        private ActivityLogService $activityLogService,
    ) {}

    public function edit()
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        return view('student.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());

        $data = $request->validate([
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
            'github_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
        ]);

        $this->studentRepository->updateProfile($profile->id, $data);

        $this->activityLogService->log(
            Auth::id(),
            'Update Profile',
            'Profile',
            'Profile updated successfully',
            $request
        );

        return redirect()->route('student.profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $profile = $this->studentRepository->findByUserId(Auth::id());

        if ($profile->photo) {
            Storage::disk('public')->delete($profile->photo);
        }

        $path = $request->file('photo')->store('photos', 'public');
        $this->studentRepository->updateProfile($profile->id, ['photo' => $path]);

        return redirect()->route('student.profile.edit')->with('success', 'Foto berhasil diupload.');
    }
}
