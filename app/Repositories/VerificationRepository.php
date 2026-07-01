<?php

namespace App\Repositories;

use App\Models\Verification;
use App\Models\VerificationLog;
use App\Repositories\Interfaces\VerificationRepositoryInterface;

class VerificationRepository implements VerificationRepositoryInterface
{
    public function create(array $data)
    {
        return Verification::create($data);
    }

    public function findPending()
    {
        return Verification::where('status', 'pending')
            ->with('studentProfile.user', 'verifiable')
            ->orderByDesc('created_at')
            ->get();
    }

    public function findById(string $id)
    {
        return Verification::with('studentProfile.user', 'verifiable', 'verifier', 'verificationLogs')
            ->findOrFail($id);
    }

    public function updateStatus(string $id, string $status, string $verifiedBy, ?string $notes = null)
    {
        $verification = Verification::findOrFail($id);
        $previousStatus = $verification->status;

        $verification->update([
            'status' => $status,
            'verified_by' => $verifiedBy,
            'verified_at' => now(),
            'notes' => $notes,
        ]);

        if ($verification->verifiable) {
            $verification->verifiable->update(['verification_status' => $status]);
        }

        VerificationLog::create([
            'verification_id' => $verification->id,
            'previous_status' => $previousStatus,
            'current_status' => $status,
            'changed_by' => $verifiedBy,
            'notes' => $notes,
            'created_at' => now(),
        ]);

        return $verification;
    }

    public function getHistory(string $studentProfileId)
    {
        return Verification::where('student_profile_id', $studentProfileId)
            ->with('verifier', 'verifiable')
            ->orderByDesc('created_at')
            ->get();
    }

    public function countPending()
    {
        return Verification::where('status', 'pending')->count();
    }
}
