<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\VerificationRepositoryInterface;
use App\Services\ActivityLogService;
use App\Services\VerificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function __construct(
        private VerificationRepositoryInterface $verificationRepository,
        private VerificationService $verificationService,
        private ActivityLogService $activityLogService,
    ) {}

    public function index()
    {
        $pendingVerifications = $this->verificationRepository->findPending();
        return view('admin.verifications.index', compact('pendingVerifications'));
    }

    public function show(string $id)
    {
        $verification = $this->verificationRepository->findById($id);
        return view('admin.verifications.show', compact('verification'));
    }

    public function approve(Request $request, string $id)
    {
        $data = $request->validate(['notes' => 'nullable|string|max:500']);
        $verification = $this->verificationService->approve($id, Auth::id(), $data['notes'] ?? null);

        $this->activityLogService->log(
            Auth::id(),
            'Approve Verification',
            'Verification',
            "Approved verification for {$verification->verifiable_type}",
            $request
        );

        return redirect()->route('admin.verifications.index')->with('success', 'Verifikasi berhasil disetujui.');
    }

    public function reject(Request $request, string $id)
    {
        $data = $request->validate(['notes' => 'nullable|string|max:500']);
        $verification = $this->verificationService->reject($id, Auth::id(), $data['notes'] ?? null);

        $this->activityLogService->log(
            Auth::id(),
            'Reject Verification',
            'Verification',
            "Rejected verification for {$verification->verifiable_type}",
            $request
        );

        return redirect()->route('admin.verifications.index')->with('success', 'Verifikasi berhasil ditolak.');
    }
}
