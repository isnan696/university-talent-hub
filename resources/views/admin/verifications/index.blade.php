@extends('layouts.app')
@section('title', 'Verifikasi')
@section('content')
<div class="card">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h5 class="fw-bold mb-0">Data Menunggu Verifikasi</h5>
    </div>
    <div class="card-body px-4 pb-4">
        @forelse($pendingVerifications as $verification)
        <div class="d-flex justify-content-between align-items-center p-3 mb-2" style="background:#F8FAFC;border-radius:12px;">
            <div>
                <h6 class="fw-bold mb-1">{{ $verification->verifiable?->skill_name ?? $verification->verifiable?->certificate_name ?? $verification->verifiable?->project_title ?? 'Data' }}</h6>
                <p class="text-secondary mb-0" style="font-size:0.85rem;">
                    {{ $verification->studentProfile->user->name }} -
                    <span class="badge bg-light text-dark">{{ class_basename($verification->verifiable_type) }}</span>
                    <span class="badge badge-pending">Pending</span>
                </p>
            </div>
            <div class="d-flex gap-2">
                <form action="{{ route('admin.verifications.approve', $verification->id) }}" method="POST" class="d-inline">
                    @csrf @method('PATCH')
                    <input type="hidden" name="notes" value="Disetujui oleh admin.">
                    <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i></button>
                </form>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $verification->id }}">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
        </div>

        <div class="modal fade" id="rejectModal{{ $verification->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">Tolak Verifikasi</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                    <form action="{{ route('admin.verifications.reject', $verification->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <div class="modal-body">
                            <label class="form-label">Alasan Penolakan</label>
                            <textarea name="notes" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-5">
            <i class="bi bi-check-circle" style="font-size:3rem;color:#D1D5DB;"></i>
            <p class="text-secondary mt-3">Tidak ada data yang menunggu verifikasi.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
