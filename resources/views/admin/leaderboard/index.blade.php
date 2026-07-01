@extends('layouts.app')
@section('title', 'Leaderboard')
@section('content')
<div class="card">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h5 class="fw-bold mb-0"><i class="bi bi-trophy" style="color:#F59E0B;"></i> Peringkat Mahasiswa</h5>
    </div>
    <div class="card-body px-4 pb-4">
        <div class="table-responsive">
            <table class="table table-borderless align-middle">
                <thead>
                    <tr class="text-secondary" style="font-size:0.85rem;">
                        <th>Peringkat</th><th>Mahasiswa</th><th>NIM</th><th>Program Studi</th><th class="text-end">Total Poin</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leaderboard as $index => $student)
                    <tr>
                        <td>
                            @if($index == 0)<span class="badge bg-warning text-dark">🥇 1</span>
                            @elseif($index == 1)<span class="badge bg-secondary">🥈 2</span>
                            @elseif($index == 2)<span class="badge" style="background:#CD7F32;">🥉 3</span>
                            @else<span class="text-secondary">#{{ $index + 1 }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-initial" style="width:36px;height:36px;font-size:0.8rem;">{{ substr($student->user->name, 0, 1) }}</div>
                                <span class="fw-semibold">{{ $student->user->name }}</span>
                            </div>
                        </td>
                        <td>{{ $student->nim }}</td>
                        <td>{{ $student->program_studi }}</td>
                        <td class="text-end fw-bold" style="color:#F59E0B;">{{ $student->total_points }} Poin</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-secondary py-5">Belum ada data leaderboard.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
