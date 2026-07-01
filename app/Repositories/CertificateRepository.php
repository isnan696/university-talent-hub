<?php

namespace App\Repositories;

use App\Models\Certificate;
use App\Repositories\Interfaces\CertificateRepositoryInterface;

class CertificateRepository implements CertificateRepositoryInterface
{
    public function findByStudent(string $studentProfileId)
    {
        return Certificate::where('student_profile_id', $studentProfileId)
            ->orderByDesc('created_at')
            ->get();
    }

    public function create(array $data)
    {
        return Certificate::create($data);
    }

    public function update(string $id, array $data)
    {
        $cert = Certificate::findOrFail($id);
        $cert->update($data);
        return $cert;
    }

    public function delete(string $id)
    {
        return Certificate::findOrFail($id)->delete();
    }

    public function findPending()
    {
        return Certificate::where('verification_status', 'pending')
            ->with('studentProfile.user')
            ->get();
    }

    public function countByStudent(string $studentProfileId)
    {
        return Certificate::where('student_profile_id', $studentProfileId)->count();
    }
}
