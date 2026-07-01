@extends('layouts.app')
@section('title', 'Sertifikat Saya')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Sertifikat Saya</h5>
    <a href="{{ route('student.certificates.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Upload Sertifikat</a>
</div>
<div class="row g-4">
    @forelse($certificates as $cert)
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h6 class="fw-bold mb-1">{{ $cert->certificate_name }}</h6>
                    <span class="badge {{ $cert->verification_status == 'approved' ? 'badge-approved' : ($cert->verification_status == 'pending' ? 'badge-pending' : 'badge-rejected') }}">
                        {{ $cert->verification_status }}
                    </span>
                </div>
                <p class="text-secondary mb-1" style="font-size:0.85rem;"><i class="bi bi-building"></i> {{ $cert->organizer }}</p>
                <p class="text-secondary mb-2" style="font-size:0.85rem;"><i class="bi bi-calendar"></i> {{ $cert->issue_date->format('d M Y') }}</p>
                <div class="d-flex gap-2">
                    <a href="{{ route('student.certificates.edit', $cert->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                    @if($cert->verification_status != 'pending')
                    <form action="{{ route('student.certificates.submit', $cert->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Ajukan Verifikasi</button>
                    </form>
                    @endif
                    <form action="{{ route('student.certificates.destroy', $cert->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus sertifikat?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                    </form>
                </div>
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
