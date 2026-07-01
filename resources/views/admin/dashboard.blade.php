@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
{{-- ===== TOP STAT CARDS ===== --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div>
                <p class="stat-label">Total Mahasiswa</p>
                <div class="stat-value">{{ $stats['total_students'] }}</div>
            </div>
            <div class="stat-icon blue"><i class="bi bi-people-fill"></i></div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div>
                <p class="stat-label">Total Skill</p>
                <div class="stat-value">{{ $stats['total_skills'] }}</div>
            </div>
            <div class="stat-icon cyan"><i class="bi bi-code-slash"></i></div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div>
                <p class="stat-label">Total Sertifikat</p>
                <div class="stat-value">{{ $stats['total_certificates'] }}</div>
            </div>
            <div class="stat-icon mint"><i class="bi bi-patch-check-fill"></i></div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div>
                <p class="stat-label">Total Portfolio</p>
                <div class="stat-value">{{ $stats['total_portfolios'] }}</div>
            </div>
            <div class="stat-icon amber"><i class="bi bi-folder-fill"></i></div>
        </div>
    </div>
</div>

{{-- ===== SECONDARY STAT CARDS ===== --}}
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div>
                <p class="stat-label">Menunggu Verifikasi</p>
                <div class="stat-value" style="color:var(--orange);">{{ $stats['pending_verifications'] }}</div>
            </div>
            <div class="stat-icon amber"><i class="bi bi-clock-history"></i></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div>
                <p class="stat-label">Reward Aktif</p>
                <div class="stat-value" style="color:var(--green);">{{ $stats['active_rewards'] }}</div>
            </div>
            <div class="stat-icon mint"><i class="bi bi-gift-fill"></i></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div>
                <p class="stat-label">Opportunity Aktif</p>
                <div class="stat-value" style="color:var(--primary);">{{ $stats['active_opportunities'] }}</div>
            </div>
            <div class="stat-icon blue"><i class="bi bi-megaphone-fill"></i></div>
        </div>
    </div>
</div>

{{-- ===== QUICK ACTIONS ===== --}}
<div class="row g-3 mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent border-0 pt-3 px-4 d-flex align-items-center justify-content-between">
                <h6 class="fw-bold mb-0"><i class="bi bi-lightning-charge-fill me-2" style="color:var(--orange);"></i>Aksi Cepat</h6>
            </div>
            <div class="card-body pt-2 px-4 pb-4">
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('admin.verifications.index') }}" class="btn btn-warning btn-sm text-white">
                        <i class="bi bi-check-circle me-1"></i> Verifikasi ({{ $stats['pending_verifications'] }})
                    </a>
                    <a href="{{ route('admin.students.index') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-people me-1"></i> Kelola Mahasiswa
                    </a>
                    <a href="{{ route('admin.rewards.index') }}" class="btn btn-success btn-sm">
                        <i class="bi bi-gift me-1"></i> Kelola Reward
                    </a>
                    <a href="{{ route('admin.opportunities.index') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-megaphone me-1"></i> Kelola Opportunity
                    </a>
                    <a href="{{ route('admin.leaderboard') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-trophy me-1"></i> Lihat Leaderboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== RECENT REWARD CLAIMS ===== --}}
@if(count($stats['recent_claims'] ?? []) > 0)
<div class="row g-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent border-0 pt-3 px-4 d-flex align-items-center justify-content-between">
                <h6 class="fw-bold mb-0"><i class="bi bi-gift-fill me-2" style="color:var(--green);"></i>Klaim Reward Terbaru</h6>
                <a href="{{ route('admin.rewards.index') }}" class="btn btn-sm btn-outline-primary" style="font-size:12px;">Lihat Semua</a>
            </div>
            <div class="card-body px-4 pb-4 pt-0">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead>
                            <tr>
                                <th>Mahasiswa</th>
                                <th>Reward</th>
                                <th>Poin</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stats['recent_claims'] as $claim)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-initial" style="width:30px;height:30px;font-size:11px;">
                                            {{ strtoupper(substr($claim->studentProfile?->user?->name ?? '-', 0, 2)) }}
                                        </div>
                                        <span style="font-weight:500;">{{ $claim->studentProfile?->user?->name ?? '-' }}</span>
                                    </div>
                                </td>
                                <td>{{ $claim->reward->title }}</td>
                                <td><span class="badge badge-rejected">-{{ $claim->used_points }}</span></td>
                                <td style="color:var(--muted);font-size:13px;">{{ $claim->claimed_at->format('d M Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="card">
    <div class="card-body text-center py-5">
        <i class="bi bi-inbox" style="font-size:2.5rem;color:var(--line);"></i>
        <p class="text-muted mt-3 mb-0">Belum ada klaim reward dari mahasiswa.</p>
    </div>
</div>
@endif
@endsection
