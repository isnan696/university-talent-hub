@extends('layouts.app')
@section('title', 'Edit Opportunity')
@section('content')
<div class="card">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h5 class="fw-bold mb-0">Edit Opportunity</h5>
    </div>
    <div class="card-body px-4 pb-4">
        <form action="{{ route('admin.opportunities.update', $opportunity->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $opportunity->title) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="category" class="form-control" required>
                        <option value="lomba" {{ old('category', $opportunity->category) == 'lomba' ? 'selected' : '' }}>Lomba</option>
                        <option value="beasiswa" {{ old('category', $opportunity->category) == 'beasiswa' ? 'selected' : '' }}>Beasiswa</option>
                        <option value="magang" {{ old('category', $opportunity->category) == 'magang' ? 'selected' : '' }}>Magang</option>
                        <option value="workshop" {{ old('category', $opportunity->category) == 'workshop' ? 'selected' : '' }}>Workshop</option>
                        <option value="seminar" {{ old('category', $opportunity->category) == 'seminar' ? 'selected' : '' }}>Seminar</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Penyelenggara <span class="text-danger">*</span></label>
                    <input type="text" name="organizer" class="form-control" value="{{ old('organizer', $opportunity->organizer) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location', $opportunity->location) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" rows="4" required>{{ old('description', $opportunity->description) }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $opportunity->start_date->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                    <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $opportunity->end_date->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control" required>
                        <option value="active" {{ old('status', $opportunity->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="expired" {{ old('status', $opportunity->status) == 'expired' ? 'selected' : '' }}>Expired</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">URL Pendaftaran</label>
                    <input type="url" name="registration_url" class="form-control" value="{{ old('registration_url', $opportunity->registration_url) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="image" class="form-control" accept="image/jpeg,image/png">
                    @if($opportunity->image)
                    <small class="text-secondary">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    @endif
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
