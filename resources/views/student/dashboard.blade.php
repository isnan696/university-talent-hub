@extends('layouts.app')
@section('title', 'Dashboard Mahasiswa')
@section('content')
@if($dashboard)
{{-- ===== STAT CARDS ===== --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div>
                <p class="stat-label">Total Skill</p>
                <div class="stat-value">{{ $dashboard['skills_count'] }}</div>
            </div>
            <div class="stat-icon blue"><i class="bi bi-code-slash"></i></div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div>
                <p class="stat-label">Sertifikat</p>
                <div class="stat-value">{{ $dashboard['certificates_count'] }}</div>
            </div>
            <div class="stat-icon mint"><i class="bi bi-patch-check-fill"></i></div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div>
                <p class="stat-label">Portfolio</p>
                <div class="stat-value">{{ $dashboard['portfolios_count'] }}</div>
            </div>
            <div class="stat-icon amber"><i class="bi bi-folder-fill"></i></div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div>
                <p class="stat-label">Total Poin</p>
                <div class="stat-value">{{ $dashboard['points']?->total_points ?? 0 }}</div>
            </div>
            <div class="stat-icon rose"><i class="bi bi-star-fill"></i></div>
        </div>
    </div>
</div>

{{-- ===== TWO-COLUMN LAYOUT ===== --}}
<div class="row g-4">
    {{-- LEFT COLUMN --}}
    <div class="col-lg-8">
        {{-- Student Profile Card --}}
        @if($dashboard['profile'])
        <div class="card mb-4">
            <div class="card-body" style="padding:22px;">
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    @if($dashboard['profile']->photo)
                    <img src="{{ asset('storage/'.$dashboard['profile']->photo) }}" class="avatar" style="width:66px;height:66px;">
                    @else
                    <div class="avatar-initial lg">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
                    @endif
                    <div class="flex-grow-1">
                        <h5 class="mb-1 fw-bold" style="font-size:20px;">{{ auth()->user()->name }}</h5>
                        <p class="text-muted mb-2" style="font-size:14px;">
                            {{ $dashboard['profile']->program_studi ?? '-' }} — {{ $dashboard['profile']->nim ?? '-' }}
                        </p>
                        <div class="progress-custom">
                            <div class="progress-fill" style="width:{{ $dashboard['profile']->profile_completion }}%;"></div>
                        </div>
                    </div>
                    <span class="badge {{ $dashboard['profile']->profile_completion >= 80 ? 'badge-approved' : 'badge-pending' }}" style="align-self:flex-start;">
                        {{ $dashboard['profile']->profile_completion }}% lengkap
                    </span>
                </div>
            </div>
        </div>

        {{-- Pending Alert --}}
        @if($dashboard['pending_count'] > 0)
        <div class="alert alert-warning d-flex align-items-center gap-2 py-3 mb-4">
            <i class="bi bi-clock-history" style="font-size:1.1rem;"></i>
            <span><strong>{{ $dashboard['pending_count'] }}</strong> data menunggu verifikasi admin</span>
        </div>
        @endif

        {{-- AI Recommendations --}}
        <div class="card mb-4">
            <div class="card-header bg-transparent border-0 pt-3 px-4 d-flex align-items-center justify-content-between">
                <h6 class="fw-bold mb-0"><i class="bi bi-stars me-2" style="color:var(--primary);"></i>Rekomendasi AI</h6>
                <span class="text-muted" style="font-size:12px;">Rule-based engine</span>
            </div>
            <div class="card-body pt-2 px-4 pb-4">
                @forelse($dashboard['recommendations'] as $rec)
                <div class="recommendation-card">
                    <h6>{{ $rec->title }}</h6>
                    <p>{{ $rec->description }}</p>
                </div>
                @empty
                <div class="text-center py-4">
                    <i class="bi bi-lightbulb" style="font-size:2rem;color:var(--orange);"></i>
                    <p class="text-muted mt-2 mb-0">Belum ada rekomendasi. Tambahkan lebih banyak skill dan sertifikat untuk mendapatkan saran.</p>
                </div>
                @endforelse
            </div>
        </div>
        @else
        {{-- No Profile State --}}
        <div class="card mb-4">
            <div class="card-body text-center py-5">
                <div class="avatar-initial lg mx-auto mb-3" style="opacity:.6;">
                    <i class="bi bi-person-plus"></i>
                </div>
                <h5 class="fw-bold">Lengkapi Profil Anda</h5>
                <p class="text-muted mb-3">Buat profil terlebih dahulu untuk melihat dashboard lengkap, rekomendasi AI, dan peringkat Anda.</p>
                <a href="{{ route('student.profile.edit') }}" class="btn btn-primary px-4">
                    <i class="bi bi-pencil-square me-2"></i>Lengkapi Profil
                </a>
            </div>
        </div>
        @endif
    </div>

    {{-- RIGHT COLUMN --}}
    <div class="col-lg-4">
        {{-- Ranking Card --}}
        <div class="card mb-4">
            <div class="card-header bg-transparent border-0 pt-3 px-4 d-flex align-items-center justify-content-between">
                <h6 class="fw-bold mb-0"><i class="bi bi-trophy-fill me-2" style="color:var(--orange);"></i>Peringkat</h6>
                @if($dashboard['ranking'])
                <span class="badge badge-approved">#{{ $dashboard['ranking'] }} Kampus</span>
                @endif
            </div>
            <div class="card-body pt-1 px-4 pb-4">
                @if($dashboard['ranking'])
                <div class="text-center py-3">
                    <div style="font-size:48px;font-weight:800;color:var(--primary);line-height:1;">#{{ $dashboard['ranking'] }}</div>
                    <p class="text-muted mt-2 mb-0" style="font-size:13px;">dari semua mahasiswa</p>
                </div>

                {{-- Top 3 Leaderboard Preview --}}
                @if(isset($dashboard['top_students']) && count($dashboard['top_students']) > 0)
                <div class="mt-2">
                    @foreach($dashboard['top_students'] as $index => $student)
                    <div class="leader-row">
                        <div class="rank-badge {{ $index < 2 ? 'top' : '' }}">{{ $index + 1 }}</div>
                        <div>
                            <div style="font-weight:600;font-size:14px;">{{ $student->name ?? 'Mahasiswa' }}</div>
                        </div>
                        <strong style="font-size:14px;">{{ $student->total_points ?? 0 }}</strong>
                    </div>
                    @endforeach
                </div>
                @endif
                @else
                <div class="text-center py-4">
                    <i class="bi bi-trophy" style="font-size:2.5rem;color:var(--line);"></i>
                    <p class="text-muted mt-2 mb-0" style="font-size:13px;">Kumpulkan poin untuk naik peringkat.</p>
                </div>
                @endif
            </div>
        </div>

        {{-- Recent Activity --}}
        <div class="card">
            <div class="card-header bg-transparent border-0 pt-3 px-4">
                <h6 class="fw-bold mb-0"><i class="bi bi-clock-history me-2" style="color:var(--cyan);"></i>Aktivitas Terbaru</h6>
            </div>
            <div class="card-body pt-2 px-4 pb-4">
                @if(isset($dashboard['recent_activities']) && count($dashboard['recent_activities']) > 0)
                    @foreach($dashboard['recent_activities'] as $activity)
                    <div class="activity-item">
                        <div>
                            <h6>{{ $activity->name ?? $activity->title ?? 'Aktivitas' }}</h6>
                            <p>{{ $activity->type ?? 'Update' }}</p>
                        </div>
                        <span class="badge badge-{{ $activity->verification_status ?? 'pending' }}">
                            {{ ucfirst($activity->verification_status ?? 'pending') }}
                        </span>
                    </div>
                    @endforeach
                @else
                    {{-- Fallback: Show stats-based activity --}}
                    @if($dashboard['skills_count'] > 0)
                    <div class="activity-item">
                        <div>
                            <h6>{{ $dashboard['skills_count'] }} Skill Terdaftar</h6>
                            <p>Skill yang sudah ditambahkan</p>
                        </div>
                        <span class="badge badge-approved"><i class="bi bi-code-slash"></i></span>
                    </div>
                    @endif
                    @if($dashboard['certificates_count'] > 0)
                    <div class="activity-item">
                        <div>
                            <h6>{{ $dashboard['certificates_count'] }} Sertifikat</h6>
                            <p>Sertifikat yang diunggah</p>
                        </div>
                        <span class="badge badge-approved"><i class="bi bi-patch-check"></i></span>
                    </div>
                    @endif
                    @if($dashboard['portfolios_count'] > 0)
                    <div class="activity-item">
                        <div>
                            <h6>{{ $dashboard['portfolios_count'] }} Portfolio</h6>
                            <p>Portfolio yang dibuat</p>
                        </div>
                        <span class="badge badge-pending"><i class="bi bi-folder"></i></span>
                    </div>
                    @endif
                    @if($dashboard['skills_count'] == 0 && $dashboard['certificates_count'] == 0 && $dashboard['portfolios_count'] == 0)
                    <div class="text-center py-3">
                        <i class="bi bi-journal-text" style="font-size:2rem;color:var(--line);"></i>
                        <p class="text-muted mt-2 mb-0" style="font-size:13px;">Belum ada aktivitas. Mulai tambahkan skill atau sertifikat!</p>
                    </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@else
{{-- No Dashboard Data --}}
<div class="card">
    <div class="card-body text-center py-5">
        <div class="avatar-initial lg mx-auto mb-3" style="opacity:.6;">
            <i class="bi bi-person-plus"></i>
        </div>
        <h5 class="fw-bold">Selamat Datang!</h5>
        <p class="text-muted mb-3">Lengkapi profil Anda terlebih dahulu untuk mulai menggunakan platform.</p>
        <a href="{{ route('student.profile.edit') }}" class="btn btn-primary px-4">
            <i class="bi bi-pencil-square me-2"></i>Lengkapi Profil
        </a>
    </div>
</div>
@endif
@endsection
