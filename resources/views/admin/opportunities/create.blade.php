@extends('layouts.app')
@section('title', 'Tambah Opportunity')
@section('content')
<div class="card">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h5 class="fw-bold mb-0">Tambah Opportunity Baru</h5>
    </div>
    <div class="card-body px-4 pb-4">
        <form action="{{ route('admin.opportunities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="category" class="form-control" required>
                        <option value="">Pilih Kategori</option>
                        <option value="lomba" {{ old('category') == 'lomba' ? 'selected' : '' }}>Lomba</option>
                        <option value="beasiswa" {{ old('category') == 'beasiswa' ? 'selected' : '' }}>Beasiswa</option>
                        <option value="magang" {{ old('category') == 'magang' ? 'selected' : '' }}>Magang</option>
                        <option value="workshop" {{ old('category') == 'workshop' ? 'selected' : '' }}>Workshop</option>
                        <option value="seminar" {{ old('category') == 'seminar' ? 'selected' : '' }}>Seminar</option>
                        <option value="lomba" {{ old('category') == 'competition' ? 'selected' : '' }}>Competition</option>
                        <option value="beasiswa" {{ old('category') == 'scholarship' ? 'selected' : '' }}>Scholarship</option>
                        <option value="magang" {{ old('category') == 'internship' ? 'selected' : '' }}>Internship</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Penyelenggara <span class="text-danger">*</span></label>
                    <input type="text" name="organizer" class="form-control" value="{{ old('organizer') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location') }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                    <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">URL Pendaftaran</label>
                    <input type="url" name="registration_url" class="form-control" value="{{ old('registration_url') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="image" class="form-control" accept="image/jpeg,image/png">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.opportunities.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
