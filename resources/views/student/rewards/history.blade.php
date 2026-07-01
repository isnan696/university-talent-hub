@extends('layouts.app')
@section('title', 'Riwayat Klaim')
@section('content')
<div class="card">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h5 class="fw-bold mb-0">Riwayat Klaim Reward</h5>
    </div>
    <div class="card-body px-4 pb-4">
        @forelse($history as $claim)
        <div class="d-flex justify-content-between align-items-center p-3 mb-2" style="background:#F8FAFC;border-radius:12px;">
            <div>
                <h6 class="fw-bold mb-1">{{ $claim->reward->title }}</h6>
                <p class="text-secondary mb-0" style="font-size:0.85rem;">{{ $claim->claimed_at->format('d M Y H:i') }}</p>
            </div>
            <div class="text-end">
                <span class="fw-bold" style="color:#F59E0B;">-{{ $claim->used_points }} Poin</span>
                <br><span class="badge {{ $claim->status == 'approved' ? 'badge-approved' : 'badge-pending' }}">{{ $claim->status }}</span>
            </div>
        </div>
        @empty
        <div class="text-center py-5">
            <i class="bi bi-clock-history" style="font-size:3rem;color:#D1D5DB;"></i>
            <p class="text-secondary mt-3">Belum ada riwayat klaim.</p>
        </div>
        @endforelse
        <a href="{{ route('student.rewards.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
