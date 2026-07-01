@extends('layouts.app')
@section('title', 'Detail Verifikasi')
@section('content')
<div class="card">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h5 class="fw-bold mb-0">Detail Verifikasi</h5>
    </div>
    <div class="card-body px-4 pb-4">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label text-secondary">Mahasiswa</label>
                <p class="fw-semibold">{{ $verification->studentProfile->user->name ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <label class="form-label text-secondary">Tipe</label>
                <p class="fw-semibold">{{ class_basename($verification->verifiable_type) }}</p>
            </div>
            <div class="col-md-6">
                <label class="form-label text-secondary">Status</label>
                <p><span class="badge {{ $verification->status == 'approved' ? 'badge-approved' : ($verification->status == 'pending' ? 'badge-pending' : 'badge-rejected') }}">{{ $verification->status }}</span></p>
            </div>
            <div class="col-md-6">
                <label class="form-label text-secondary">Diverifikasi Oleh</label>
                <p class="fw-semibold">{{ $verification->verifiedBy->name ?? '-' }}</p>
            </div>
            <div class="col-12">
                <label class="form-label text-secondary">Catatan</label>
                <p class="fw-semibold">{{ $verification->notes ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <label class="form-label text-secondary">Diajukan Pada</label>
                <p class="fw-semibold">{{ $verification->submitted_at?->format('d M Y H:i') ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <label class="form-label text-secondary">Diverifikasi Pada</label>
                <p class="fw-semibold">{{ $verification->verified_at?->format('d M Y H:i') ?? '-' }}</p>
            </div>
            @if($verification->notes && $verification->status == 'rejected')
            <div class="col-12">
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle"></i> Alasan penolakan: {{ $verification->notes }}
                </div>
            </div>
            @endif
        </div>
        <a href="{{ route('admin.verifications.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
