@extends('layouts.app')
@section('title', 'Detail Mahasiswa')
@section('content')
<div class="card mb-4">
    <div class="card-body px-4 pb-4">
        <div class="d-flex align-items-center gap-3 mb-4">
            <div class="avatar-initial" style="width:56px;height:56px;font-size:1.5rem;">{{ substr($student->user->name, 0, 1) }}</div>
            <div>
                <h5 class="fw-bold mb-1">{{ $student->user->name }}</h5>
                <p class="text-secondary mb-0">{{ $student->nim }} &middot; {{ $student->program_studi }}</p>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label text-secondary">Tempat Lahir</label>
                <p class="fw-semibold">{{ $student->tempat_lahir ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <label class="form-label text-secondary">Tanggal Lahir</label>
                <p class="fw-semibold">{{ $student->tanggal_lahir ? $student->tanggal_lahir->format('d M Y') : '-' }}</p>
            </div>
            <div class="col-md-6">
                <label class="form-label text-secondary">Jenis Kelamin</label>
                <p class="fw-semibold">{{ $student->jenis_kelamin ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <label class="form-label text-secondary">Angkatan</label>
                <p class="fw-semibold">{{ $student->angkatan ?? '-' }}</p>
            </div>
            <div class="col-12">
                <label class="form-label text-secondary">Bio</label>
                <p class="fw-semibold">{{ $student->bio ?? '-' }}</p>
            </div>
            <div class="col-12">
                <label class="form-label text-secondary">Alamat</label>
                <p class="fw-semibold">{{ $student->alamat ?? '-' }}</p>
            </div>
            <div class="col-12">
                <label class="form-label text-secondary">Telepon</label>
                <p class="fw-semibold">{{ $student->telepon ?? '-' }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-header bg-white border-0 pt-3 px-4">
                <h6 class="fw-bold mb-0">Skill</h6>
            </div>
            <div class="card-body px-4 pb-4">
                @forelse($student->skills as $skill)
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span>{{ $skill->skill_name }}
                        @if($skill->verification_status == 'approved') <i class="bi bi-check-circle-fill text-success" style="font-size:0.8rem;"></i>
                        @elseif($skill->verification_status == 'pending') <span class="badge badge-pending" style="font-size:0.65rem;">Pending</span>
                        @endif
                    </span>
                    <span class="text-secondary" style="font-size:0.85rem;">Level {{ $skill->skill_level }}</span>
                </div>
                @empty
                <p class="text-secondary text-center py-3">Belum ada skill.</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-header bg-white border-0 pt-3 px-4">
                <h6 class="fw-bold mb-0">Sertifikat</h6>
            </div>
            <div class="card-body px-4 pb-4">
                @forelse($student->certificates as $cert)
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span>{{ $cert->certificate_name }}
                        @if($cert->verification_status == 'approved') <i class="bi bi-check-circle-fill text-success" style="font-size:0.8rem;"></i>
                        @elseif($cert->verification_status == 'pending') <span class="badge badge-pending" style="font-size:0.65rem;">Pending</span>
                        @endif
                    </span>
                    <span class="text-secondary" style="font-size:0.85rem;">{{ $cert->penerbit }}</span>
                </div>
                @empty
                <p class="text-secondary text-center py-3">Belum ada sertifikat.</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-header bg-white border-0 pt-3 px-4">
                <h6 class="fw-bold mb-0">Portfolio</h6>
            </div>
            <div class="card-body px-4 pb-4">
                @forelse($student->portfolios as $port)
                <div class="mb-2">
                    <span class="fw-semibold">{{ $port->project_title }}</span>
                    @if($port->verification_status == 'approved') <i class="bi bi-check-circle-fill text-success" style="font-size:0.8rem;"></i>
                    @elseif($port->verification_status == 'pending') <span class="badge badge-pending" style="font-size:0.65rem;">Pending</span>
                    @endif
                    <p class="text-secondary mb-0" style="font-size:0.85rem;">{{ $port->project_url ? substr($port->project_url, 0, 40).'...' : '-' }}</p>
                </div>
                @empty
                <p class="text-secondary text-center py-3">Belum ada portfolio.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
