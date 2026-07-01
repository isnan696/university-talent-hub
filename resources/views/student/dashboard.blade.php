@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
@if($dashboard)
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="text-secondary mb-1" style="font-size:0.85rem;">Total Skill</p>
                    <h3 class="fw-bold mb-0">{{ $dashboard['skills_count'] }}</h3>
                </div>
                <div class="avatar-initial" style="background:#EFF6FF;color:#2563EB;"><i class="bi bi-code-slash"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="text-secondary mb-1" style="font-size:0.85rem;">Sertifikat</p>
                    <h3 class="fw-bold mb-0">{{ $dashboard['certificates_count'] }}</h3>
                </div>
                <div class="avatar-initial" style="background:#D1FAE5;color:#10B981;"><i class="bi bi-patch-check"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="text-secondary mb-1" style="font-size:0.85rem;">Portfolio</p>
                    <h3 class="fw-bold mb-0">{{ $dashboard['portfolios_count'] }}</h3>
                </div>
                <div class="avatar-initial" style="background:#FEF3C7;color:#F59E0B;"><i class="bi bi-folder"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="text-secondary mb-1" style="font-size:0.85rem;">Total Poin</p>
                    <h3 class="fw-bold mb-0">{{ $dashboard['points']?->total_points ?? 0 }}</h3>
                </div>
                <div class="avatar-initial" style="background:#FEE2E2;color:#EF4444;"><i class="bi bi-star"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-8">
        @if($dashboard['profile'])
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-3">
                    @if($dashboard['profile']->photo)
                    <img src="{{ asset('storage/'.$dashboard['profile']->photo) }}" class="avatar" style="width:64px;height:64px;">
                    @else
                    <div class="avatar-initial" style="width:64px;height:64px;font-size:1.5rem;">{{ substr(auth()->user()->name,0,1) }}</div>
                    @endif
                    <div>
                        <h5 class="mb-1">{{ auth()->user()->name }}</h5>
                        <p class="text-secondary mb-1" style="font-size:0.85rem;">{{ $dashboard['profile']->nim }} - {{ $dashboard['profile']->program_studi }}</p>
                        <span class="badge {{ $dashboard['profile']->profile_completion >= 80 ? 'badge-approved' : 'badge-pending' }}">
                            {{ $dashboard['profile']->profile_completion }}% Lengkap
                        </span>
                    </div>
                </div>
                <div class="progress profile-completion mt-2">
                    <div class="progress-bar" style="width:{{ $dashboard['profile']->profile_completion }}%; background:#2563EB; border-radius:4px;"></div>
                </div>
            </div>
        </div>

        @if($dashboard['pending_count'] > 0)
        <div class="alert alert-warning py-2" style="border-radius:12px;">
            <i class="bi bi-clock-history"></i> {{ $dashboard['pending_count'] }} menunggu verifikasi
        </div>
        @endif

        <div class="card">
            <div class="card-header bg-white border-0 pt-3 px-4">
                <h6 class="fw-bold mb-0">AI Rekomendasi</h6>
            </div>
            <div class="card-body pt-0 px-4 pb-4">
                @forelse($dashboard['recommendations'] as $rec)
                <div class="d-flex align-items-start gap-3 mb-3 p-3" style="background:#F8FAFC;border-radius:12px;">
                    <div class="avatar-initial" style="width:32px;height:32px;font-size:0.8rem;background:#EFF6FF;color:#2563EB;">
                        <i class="bi bi-stars"></i>
                    </div>
                    <div>
                        <h6 class="mb-1" style="font-size:0.9rem;">{{ $rec->title }}</h6>
                        <p class="text-secondary mb-0" style="font-size:0.85rem;">{{ $rec->description }}</p>
                    </div>
                </div>
                @empty
                <p class="text-secondary text-center py-3">Belum ada rekomendasi.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-white border-0 pt-3 px-4">
                <h6 class="fw-bold mb-0"><i class="bi bi-trophy" style="color:#F59E0B;"></i> Peringkat</h6>
            </div>
            <div class="card-body pt-0 px-4 pb-4">
                @if($dashboard['ranking'])
                <div class="text-center py-3">
                    <h1 class="fw-bold" style="color:#2563EB;">#{{ $dashboard['ranking'] }}</h1>
                    <p class="text-secondary">dari semua mahasiswa</p>
                </div>
                @else
                <p class="text-secondary text-center py-3">Kumpulkan poin untuk naik peringkat.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@else
<div class="text-center py-5">
    <p class="text-secondary">Lengkapi profil Anda terlebih dahulu.</p>
    <a href="{{ route('student.profile.edit') }}" class="btn btn-primary">Lengkapi Profil</a>
</div>
@endif
@endsection
