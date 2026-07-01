@extends('layouts.app')
@section('title', 'Opportunity')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Daftar Opportunity</h5>
    <a href="{{ route('admin.opportunities.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Opportunity</a>
</div>
<div class="card">
    <div class="card-body px-4 pb-4">
        <div class="table-responsive">
            <table class="table table-borderless align-middle">
                <thead>
                    <tr class="text-secondary" style="font-size:0.85rem;">
                        <th>Judul</th><th>Kategori</th><th>Penyelenggara</th><th>Tanggal Mulai</th><th>Tanggal Selesai</th><th>Status</th><th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($opportunities as $opp)
                    <tr>
                        <td class="fw-semibold">{{ $opp->title }}</td>
                        <td>{{ $opp->category }}</td>
                        <td>{{ $opp->organizer }}</td>
                        <td>{{ $opp->start_date->format('d M Y') }}</td>
                        <td>{{ $opp->end_date->format('d M Y') }}</td>
                        <td><span class="badge {{ $opp->status == 'active' ? 'badge-approved' : 'bg-secondary' }}">{{ $opp->status }}</span></td>
                        <td>
                            <a href="{{ route('admin.opportunities.edit', $opp->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.opportunities.destroy', $opp->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus opportunity ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-secondary py-5">Belum ada opportunity.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
