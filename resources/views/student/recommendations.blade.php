@extends('layouts.app')
@section('title', 'AI Rekomendasi')
@section('content')
<div class="card">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h5 class="fw-bold mb-0"><i class="bi bi-stars" style="color:#F59E0B;"></i> AI Rekomendasi</h5>
    </div>
    <div class="card-body px-4 pb-4">
        @forelse($recommendations as $rec)
        <div class="d-flex align-items-start gap-3 mb-3 p-4" style="background:#F8FAFC;border-radius:16px;">
            <div class="avatar-initial" style="width:40px;height:40px;background:#EFF6FF;color:#2563EB;">
                <i class="bi bi-stars"></i>
            </div>
            <div>
                <h6 class="fw-bold mb-1">{{ $rec->title }}</h6>
                <p class="text-secondary mb-2">{{ $rec->description }}</p>
                <span class="badge {{ $rec->priority <= 2 ? 'badge-approved' : ($rec->priority <= 4 ? 'badge-pending' : 'bg-light text-dark') }}">
                    Prioritas {{ $rec->priority }}
                </span>
            </div>
        </div>
        @empty
        <div class="text-center py-5">
            <i class="bi bi-stars" style="font-size:3rem;color:#D1D5DB;"></i>
            <p class="text-secondary mt-3">Belum ada rekomendasi. Lengkapi data profil Anda untuk mendapatkan rekomendasi.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
