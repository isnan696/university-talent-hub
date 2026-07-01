<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Verification;
use App\Repositories\Interfaces\CertificateRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function __construct(
        private CertificateRepositoryInterface $certificateRepository,
        private StudentRepositoryInterface $studentRepository,
    ) {}

    public function index(): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        return response()->json([
            'success' => true,
            'data' => $this->certificateRepository->findByStudent($profile->id),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());

        $data = $request->validate([
            'certificate_name' => 'required|string|max:200',
            'organizer' => 'required|string|max:150',
            'issue_date' => 'required|date',
            'expired_date' => 'nullable|date',
            'credential_url' => 'nullable|url|max:255',
        ]);

        $certificate = $this->certificateRepository->create([
            'student_profile_id' => $profile->id,
            'certificate_name' => $data['certificate_name'],
            'organizer' => $data['organizer'],
            'issue_date' => $data['issue_date'],
            'expiry_date' => $data['expired_date'] ?? null,
            'credential_url' => $data['credential_url'] ?? null,
            'file_path' => $request->file('certificate_path')?->store('certificates', 'public') ?? '',
            'verification_status' => 'draft',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Certificate uploaded successfully',
            'data' => $certificate,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $cert = $profile->certificates()->findOrFail($id);
        return response()->json(['success' => true, 'data' => $cert]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $profile->certificates()->findOrFail($id);

        $data = $request->validate([
            'certificate_name' => 'required|string|max:200',
            'organizer' => 'required|string|max:150',
            'issue_date' => 'required|date',
        ]);

        $this->certificateRepository->update($id, $data);
        return response()->json(['success' => true, 'message' => 'Certificate updated successfully']);
    }

    public function destroy(string $id): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $profile->certificates()->findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Certificate deleted successfully']);
    }

    public function submit(string $id): JsonResponse
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $certificate = $profile->certificates()->findOrFail($id);
        $certificate->update(['verification_status' => 'pending']);

        Verification::create([
            'student_profile_id' => $profile->id,
            'verifiable_type' => get_class($certificate),
            'verifiable_id' => $certificate->id,
            'status' => 'pending',
        ]);

        return response()->json(['success' => true, 'message' => 'Certificate submitted for verification']);
    }
}
