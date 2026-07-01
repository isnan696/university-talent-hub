@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <p class="text-secondary mb-1" style="font-size:0.85rem;">Total Mahasiswa</p>
            <h3 class="fw-bold mb-0">{{ $stats['total_students'] }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <p class="text-secondary mb-1" style="font-size:0.85rem;">Total Skill</p>
            <h3 class="fw-bold mb-0">{{ $stats['total_skills'] }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <p class="text-secondary mb-1" style="font-size:0.85rem;">Total Sertifikat</p>
            <h3 class="fw-bold mb-0">{{ $stats['total_certificates'] }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <p class="text-secondary mb-1" style="font-size:0.85rem;">Total Portfolio</p>
            <h3 class="fw-bold mb-0">{{ $stats['total_portfolios'] }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <p class="text-secondary mb-1" style="font-size:0.85rem;">Menunggu Verifikasi</p>
            <h3 class="fw-bold mb-0" style="color:#F59E0B;">{{ $stats['pending_verifications'] }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <p class="text-secondary mb-1" style="font-size:0.85rem;">Reward Aktif</p>
            <h3 class="fw-bold mb-0" style="color:#10B981;">{{ $stats['active_rewards'] }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <p class="text-secondary mb-1" style="font-size:0.85rem;">Opportunity Aktif</p>
            <h3 class="fw-bold mb-0" style="color:#2563EB;">{{ $stats['active_opportunities'] }}</h3>
        </div>
    </div>
</div>

@if(count($stats['recent_claims'] ?? []) > 0)
<div class="card">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h6 class="fw-bold mb-0">Klaim Reward Terbaru</h6>
    </div>
    <div class="card-body px-4 pb-4">
        <table class="table table-borderless">
            <thead><tr><th>Mahasiswa</th><th>Reward</th><th>Poin</th><th>Tanggal</th></tr></thead>
            <tbody>
                @foreach($stats['recent_claims'] as $claim)
                <tr>
                    <td>{{ $claim->studentProfile?->user?->name ?? '-' }}</td>
                    <td>{{ $claim->reward->title }}</td>
                    <td>-{{ $claim->used_points }}</td>
                    <td>{{ $claim->claimed_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
