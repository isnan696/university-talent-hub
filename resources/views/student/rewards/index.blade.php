@extends('layouts.app')
@section('title', 'Reward')
@section('content')
<div class="card mb-4">
    <div class="card-body text-center">
        <h3 class="fw-bold" style="color:#2563EB;">{{ $point?->total_points ?? 0 }}</h3>
        <p class="text-secondary mb-0">Total Poin Anda</p>
    </div>
</div>

<div class="row g-4">
    @forelse($rewards as $reward)
    <div class="col-md-4">
        <div class="card text-center h-100">
            <div class="card-body">
                <div class="avatar-initial mx-auto mb-3" style="width:56px;height:56px;font-size:1.5rem;background:#FEF3C7;color:#F59E0B;">
                    <i class="bi bi-gift"></i>
                </div>
                <h6 class="fw-bold">{{ $reward->title }}</h6>
                @if($reward->description)
                <p class="text-secondary" style="font-size:0.85rem;">{{ $reward->description }}</p>
                @endif
                <p class="fw-bold" style="color:#F59E0B;">{{ $reward->required_points }} Poin</p>
                <form action="{{ route('student.rewards.claim', $reward->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100" {{ (!$point || $point->total_points < $reward->required_points) ? 'disabled' : '' }}>
                        {{ (!$point || $point->total_points < $reward->required_points) ? 'Poin Kurang' : 'Klaim Reward' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card text-center py-5">
            <div class="card-body">
                <i class="bi bi-gift" style="font-size:3rem;color:#D1D5DB;"></i>
                <p class="text-secondary mt-3">Belum ada reward tersedia.</p>
            </div>
        </div>
    </div>
    @endforelse
</div>

@if(count($history) > 0)
<div class="card mt-4">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h6 class="fw-bold mb-0">Riwayat Klaim</h6>
    </div>
    <div class="card-body px-4 pb-4">
        <table class="table table-borderless">
            <thead><tr><th>Reward</th><th>Poin</th><th>Tanggal</th><th>Status</th></tr></thead>
            <tbody>
                @foreach($history as $claim)
                <tr>
                    <td>{{ $claim->reward->title }}</td>
                    <td>-{{ $claim->used_points }}</td>
                    <td>{{ $claim->claimed_at->format('d M Y') }}</td>
                    <td><span class="badge badge-approved">{{ $claim->status }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
