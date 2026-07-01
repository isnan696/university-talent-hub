@extends('layouts.app')
@section('title', 'Skill Saya')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Skill Saya</h5>
    <a href="{{ route('student.skills.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Skill</a>
</div>

<div class="row g-4">
    @forelse($skills as $skill)
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <h6 class="fw-bold mb-1">{{ $skill->skill_name }}</h6>
                        <span class="badge bg-light text-dark me-1">{{ $skill->category }}</span>
                        <span class="badge bg-light text-dark">{{ $skill->level }}</span>
                    </div>
                    <span class="badge {{ $skill->verification_status == 'approved' ? 'badge-approved' : ($skill->verification_status == 'pending' ? 'badge-pending' : 'badge-rejected') }}">
                        {{ $skill->verification_status }}
                    </span>
                </div>
                @if($skill->description)
                <p class="text-secondary mb-2" style="font-size:0.85rem;">{{ Str::limit($skill->description, 100) }}</p>
                @endif
                <div class="d-flex gap-2">
                    <a href="{{ route('student.skills.edit', $skill->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                    @if($skill->verification_status != 'pending')
                    <form action="{{ route('student.skills.submit', $skill->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Ajukan Verifikasi</button>
                    </form>
                    @endif
                    <form action="{{ route('student.skills.destroy', $skill->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus skill ini?')">
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
                <i class="bi bi-code-slash" style="font-size:3rem;color:#D1D5DB;"></i>
                <p class="text-secondary mt-3">Belum ada skill. Tambahkan skill Anda!</p>
                <a href="{{ route('student.skills.create') }}" class="btn btn-primary">Tambah Skill</a>
            </div>
        </div>
    </div>
    @endforelse
</div>
@endsection
