@extends('layouts.app')
@section('title', 'Sertifikat Saya')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Sertifikat Saya</h5>
    <a href="{{ route('student.certificates.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Upload Sertifikat</a>
</div>
<div class="row g-4">
    @forelse($certificates as $cert)
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h6 class="fw-bold mb-1">{{ $cert->certificate_name }}</h6>
                    <span class="badge {{ $cert->verification_status == 'approved' ? 'badge-approved' : ($cert->verification_status == 'pending' ? 'badge-pending' : ($cert->verification_status == 'rejected' ? 'badge-rejected' : 'bg-secondary')) }}">
                        {{ ucfirst($cert->verification_status) }}
                    </span>
                </div>
                <p class="text-secondary mb-1" style="font-size:0.85rem;"><i class="bi bi-building me-1"></i>{{ $cert->organizer }}</p>
                <p class="text-secondary mb-2" style="font-size:0.85rem;"><i class="bi bi-calendar me-1"></i>{{ $cert->issue_date->format('d M Y') }}</p>

                @if($cert->verification_status == 'approved')
                {{-- Approved: tampilkan info terverifikasi --}}
                <div class="d-flex align-items-center gap-2 mb-2 p-2 rounded" style="background:#d1fae5;">
                    <i class="bi bi-check-circle-fill" style="color:#065f46;"></i>
                    <small style="color:#065f46;font-weight:500;">Sertifikat sudah diverifikasi. Edit untuk mengajukan ulang, atau upload baru.</small>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('student.certificates.edit', $cert->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <a href="{{ route('student.certificates.create') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-plus-lg me-1"></i>Upload Baru
                    </a>
                    <form action="{{ route('student.certificates.destroy', $cert->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus sertifikat?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                    </form>
                </div>
                @elseif($cert->verification_status == 'pending')
                {{-- Pending: tunggu review admin --}}
                <div class="d-flex align-items-center gap-2 mb-2 p-2 rounded" style="background:#fef3c7;">
                    <i class="bi bi-clock-history" style="color:#92400e;"></i>
                    <small style="color:#92400e;font-weight:500;">Menunggu verifikasi admin...</small>
                </div>
                <div class="d-flex gap-2">
                    <form action="{{ route('student.certificates.destroy', $cert->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus sertifikat?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                    </form>
                </div>
                @else
                {{-- Draft / Rejected --}}
                @if($cert->verification_status == 'rejected')
                <div class="d-flex align-items-center gap-2 mb-2 p-2 rounded" style="background:#fee2e2;">
                    <i class="bi bi-x-circle-fill" style="color:#991b1b;"></i>
                    <small style="color:#991b1b;font-weight:500;">Ditolak. Edit dan ajukan ulang verifikasi.</small>
                </div>
                @endif
                <div class="d-flex gap-2">
                    <a href="{{ route('student.certificates.edit', $cert->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <form action="{{ route('student.certificates.submit', $cert->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-send me-1"></i>Ajukan Verifikasi
                        </button>
                    </form>
                    <form action="{{ route('student.certificates.destroy', $cert->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus sertifikat?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card text-center py-5">
            <div class="card-body">
                <i class="bi bi-patch-check" style="font-size:3rem;color:#D1D5DB;"></i>
                <p class="text-secondary mt-3">Belum ada sertifikat. Upload sertifikat Anda!</p>
                <a href="{{ route('student.certificates.create') }}" class="btn btn-primary">Upload Sertifikat</a>
            </div>
        </div>
    </div>
    @endforelse
</div>
@endsection
