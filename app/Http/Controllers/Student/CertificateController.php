<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Verification;
use App\Repositories\Interfaces\CertificateRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Services\ActivityLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function __construct(
        private CertificateRepositoryInterface $certificateRepository,
        private StudentRepositoryInterface $studentRepository,
        private ActivityLogService $activityLogService,
    ) {}

    public function index()
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $certificates = $this->certificateRepository->findByStudent($profile->id);
        return view('student.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('student.certificates.create');
    }

    public function store(Request $request)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());

        $data = $request->validate([
            'certificate_name' => 'required|string|max:200',
            'organizer' => 'required|string|max:150',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:issue_date',
            'credential_url' => 'nullable|url|max:255',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $filePath = $request->file('file')->store('certificates', 'public');

        $certificate = $this->certificateRepository->create([
            'student_profile_id' => $profile->id,
            'certificate_name' => $data['certificate_name'],
            'organizer' => $data['organizer'],
            'issue_date' => $data['issue_date'],
            'expiry_date' => $data['expiry_date'] ?? null,
            'credential_url' => $data['credential_url'] ?? null,
            'file_path' => $filePath,
            'verification_status' => 'draft',
        ]);

        $this->activityLogService->log(
            Auth::id(),
            'Upload Certificate',
            'Certificate',
            "Uploaded certificate: {$certificate->certificate_name}",
            $request
        );

        return redirect()->route('student.certificates.index')->with('success', 'Sertifikat berhasil diupload.');
    }

    public function edit(string $id)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $certificate = $profile->certificates()->findOrFail($id);
        return view('student.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, string $id)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $certificate = $profile->certificates()->findOrFail($id);

        $data = $request->validate([
            'certificate_name' => 'required|string|max:200',
            'organizer' => 'required|string|max:150',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:issue_date',
            'credential_url' => 'nullable|url|max:255',
        ]);

        $this->certificateRepository->update($id, $data);

        return redirect()->route('student.certificates.index')->with('success', 'Sertifikat berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $profile = $this->studentRepository->findByUserId(Auth::id());
        $cert = $profile->certificates()->findOrFail($id);

        if ($cert->file_path) {
            Storage::disk('public')->delete($cert->file_path);
        }

        $cert->delete();

        return redirect()->route('student.certificates.index')->with('success', 'Sertifikat berhasil dihapus.');
    }

    public function submit(string $id)
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

        return redirect()->route('student.certificates.index')->with('success', 'Sertifikat berhasil dikirim untuk verifikasi.');
    }
}
