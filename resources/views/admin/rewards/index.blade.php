@extends('layouts.app')
@section('title', 'Reward')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Daftar Reward</h5>
    <a href="{{ route('admin.rewards.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Reward</a>
</div>
<div class="card">
    <div class="card-body px-4 pb-4">
        <div class="table-responsive">
            <table class="table table-borderless align-middle">
                <thead>
                    <tr class="text-secondary" style="font-size:0.85rem;">
                        <th>Reward</th><th>Kategori</th><th>Poin Dibutuhkan</th><th>Stok</th><th>Status</th><th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rewards as $reward)
                    <tr>
                        <td class="fw-semibold">{{ $reward->title }}</td>
                        <td>{{ $reward->category->name ?? '-' }}</td>
                        <td>{{ $reward->required_points }}</td>
                        <td>{{ $reward->stock }}</td>
                        <td><span class="badge {{ $reward->status == 'active' ? 'badge-approved' : 'bg-secondary' }}">{{ $reward->status }}</span></td>
                        <td>
                            <a href="{{ route('admin.rewards.edit', $reward->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.rewards.destroy', $reward->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus reward ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center text-secondary py-5">Belum ada reward.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
