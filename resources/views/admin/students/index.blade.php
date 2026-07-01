@extends('layouts.app')
@section('title', 'Manajemen Mahasiswa')
@section('content')
<div class="card">
    <div class="card-body px-4 pb-4">
        <form method="GET" action="{{ route('admin.students.search') }}" class="row g-2 mb-4">
            <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ request('name') }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="program_studi" class="form-control" placeholder="Program Studi" value="{{ request('program_studi') }}">
            </div>
            <div class="col-md-2">
                <input type="number" name="point_min" class="form-control" placeholder="Min Poin" value="{{ request('point_min') }}">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-search"></i> Cari</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-borderless align-middle">
                <thead>
                    <tr class="text-secondary" style="font-size:0.85rem;">
                        <th>Nama</th><th>NIM</th><th>Program Studi</th><th class="text-end">Total Poin</th><th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-initial" style="width:36px;height:36px;font-size:0.8rem;">{{ substr($student->user->name, 0, 1) }}</div>
                                <span class="fw-semibold">{{ $student->user->name }}</span>
                            </div>
                        </td>
                        <td>{{ $student->nim }}</td>
                        <td>{{ $student->program_studi }}</td>
                        <td class="text-end fw-bold" style="color:#F59E0B;">{{ $student->total_points }} Poin</td>
                        <td><a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-sm btn-outline-primary">Detail</a></td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-secondary py-5">Tidak ada mahasiswa ditemukan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
