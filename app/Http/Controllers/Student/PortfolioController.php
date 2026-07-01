<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Verification;
use App\Repositories\Interfaces\PortfolioRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Services\ActivityLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function __construct(
        private PortfolioRepositoryInterface $portfolioRepository,
        private StudentRepositoryInterface $studentRepository,
        private ActivityLogService $activityLogService,
    ) {}

    public function index()
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $portfolios = $this->portfolioRepository->findByStudent($profile->id);
        return view('student.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('student.portfolios.create');
    }

    public function store(Request $request)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());

        $data = $request->validate([
            'project_title' => 'required|string|max:200',
            'project_description' => 'required|string|max:2000',
            'project_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('portfolios', 'public');
        }

        $portfolio = $this->portfolioRepository->create([
            'student_profile_id' => $profile->id,
            'project_title' => $data['project_title'],
            'project_description' => $data['project_description'],
            'project_url' => $data['project_url'] ?? null,
            'github_url' => $data['github_url'] ?? null,
            'thumbnail' => $thumbnailPath,
            'verification_status' => 'draft',
        ]);

        $this->activityLogService->log(
            Auth::id(),
            'Add Portfolio',
            'Portfolio',
            "Added portfolio: {$portfolio->project_title}",
            $request
        );

        return redirect()->route('student.portfolios.index')->with('success', 'Portfolio berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $portfolio = $profile->portfolios()->findOrFail($id);
        return view('student.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, string $id)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $portfolio = $profile->portfolios()->findOrFail($id);

        $data = $request->validate([
            'project_title' => 'required|string|max:200',
            'project_description' => 'required|string|max:2000',
            'project_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($portfolio->thumbnail) {
                Storage::disk('public')->delete($portfolio->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('portfolios', 'public');
        }

        $wasApproved = $portfolio->verification_status === 'approved';

        $this->portfolioRepository->update($id, $data);

        // If portfolio was approved and got edited, reset to draft for re-verification
        if ($wasApproved) {
            $portfolio->update(['verification_status' => 'draft']);
        }

        $message = $wasApproved
            ? 'Portfolio berhasil diperbarui. Status direset ke draft — silakan ajukan verifikasi ulang.'
            : 'Portfolio berhasil diperbarui.';

        return redirect()->route('student.portfolios.index')->with('success', $message);
    }

    public function destroy(string $id)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $portfolio = $profile->portfolios()->findOrFail($id);

        if ($portfolio->thumbnail) {
            Storage::disk('public')->delete($portfolio->thumbnail);
        }

        $portfolio->delete();

        return redirect()->route('student.portfolios.index')->with('success', 'Portfolio berhasil dihapus.');
    }

    public function submit(string $id)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $portfolio = $profile->portfolios()->findOrFail($id);

        $portfolio->update(['verification_status' => 'pending']);

        Verification::create([
            'student_profile_id' => $profile->id,
            'verifiable_type' => get_class($portfolio),
            'verifiable_id' => $portfolio->id,
            'status' => 'pending',
        ]);

        return redirect()->route('student.portfolios.index')->with('success', 'Portfolio berhasil dikirim untuk verifikasi.');
    }
}
