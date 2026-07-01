@extends('layouts.app')
@section('title', 'Portfolio Saya')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Portfolio Saya</h5>
    <a href="{{ route('student.portfolios.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Tambah Portfolio</a>
</div>
<div class="row g-4">
    @forelse($portfolios as $portfolio)
    <div class="col-md-6">
        <div class="card">
            @if($portfolio->thumbnail)
            <img src="{{ asset('storage/'.$portfolio->thumbnail) }}" class="card-img-top" style="height:180px;object-fit:cover;border-radius:16px 16px 0 0;">
            @endif
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h6 class="fw-bold mb-1">{{ $portfolio->project_title }}</h6>
                    <span class="badge {{ $portfolio->verification_status == 'approved' ? 'badge-approved' : ($portfolio->verification_status == 'pending' ? 'badge-pending' : ($portfolio->verification_status == 'rejected' ? 'badge-rejected' : 'bg-secondary')) }}">
                        {{ ucfirst($portfolio->verification_status) }}
                    </span>
                </div>
                <p class="text-secondary mb-2" style="font-size:0.85rem;">{{ Str::limit($portfolio->project_description, 100) }}</p>
                @if($portfolio->github_url || $portfolio->project_url)
                <div class="mb-2">
                    @if($portfolio->github_url)<a href="{{ $portfolio->github_url }}" target="_blank" class="btn btn-outline-dark btn-sm me-1"><i class="bi bi-github"></i></a>@endif
                    @if($portfolio->project_url)<a href="{{ $portfolio->project_url }}" target="_blank" class="btn btn-outline-primary btn-sm"><i class="bi bi-link-45deg"></i> Demo</a>@endif
                </div>
                @endif

                @if($portfolio->verification_status == 'approved')
                {{-- Approved: tampilkan info terverifikasi --}}
                <div class="d-flex align-items-center gap-2 mb-2 p-2 rounded" style="background:#d1fae5;">
                    <i class="bi bi-check-circle-fill" style="color:#065f46;"></i>
                    <small style="color:#065f46;font-weight:500;">Portfolio sudah diverifikasi. Edit untuk mengajukan ulang, atau buat baru.</small>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('student.portfolios.edit', $portfolio->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <a href="{{ route('student.portfolios.create') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-plus-lg me-1"></i>Buat Baru
                    </a>
                    <form action="{{ route('student.portfolios.destroy', $portfolio->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus portfolio?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                    </form>
                </div>
                @elseif($portfolio->verification_status == 'pending')
                {{-- Pending: tunggu review admin --}}
                <div class="d-flex align-items-center gap-2 mb-2 p-2 rounded" style="background:#fef3c7;">
                    <i class="bi bi-clock-history" style="color:#92400e;"></i>
                    <small style="color:#92400e;font-weight:500;">Menunggu verifikasi admin...</small>
                </div>
                <div class="d-flex gap-2">
                    <form action="{{ route('student.portfolios.destroy', $portfolio->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus portfolio?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                    </form>
                </div>
                @else
                {{-- Draft / Rejected --}}
                @if($portfolio->verification_status == 'rejected')
                <div class="d-flex align-items-center gap-2 mb-2 p-2 rounded" style="background:#fee2e2;">
                    <i class="bi bi-x-circle-fill" style="color:#991b1b;"></i>
                    <small style="color:#991b1b;font-weight:500;">Ditolak. Edit dan ajukan ulang verifikasi.</small>
                </div>
                @endif
                <div class="d-flex gap-2">
                    <a href="{{ route('student.portfolios.edit', $portfolio->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <form action="{{ route('student.portfolios.submit', $portfolio->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-send me-1"></i>Ajukan Verifikasi
                        </button>
                    </form>
                    <form action="{{ route('student.portfolios.destroy', $portfolio->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus portfolio?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card text-center py-5">
            <div class="card-body">
                <i class="bi bi-folder" style="font-size:3rem;color:#D1D5DB;"></i>
                <p class="text-secondary mt-3">Belum ada portfolio. Tambahkan portfolio Anda!</p>
                <a href="{{ route('student.portfolios.create') }}" class="btn btn-primary">Tambah Portfolio</a>
            </div>
        </div>
    </div>
    @endforelse
</div>
@endsection
