@extends('layouts.app')
@section('title', 'Tambah Skill')
@section('content')
<div class="card">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h5 class="fw-bold mb-0">Tambah Skill Baru</h5>
    </div>
    <div class="card-body px-4 pb-4">
        <form method="POST" action="{{ route('student.skills.store') }}">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Skill</label>
                    <input type="text" name="skill_name" class="form-control" value="{{ old('skill_name') }}" required placeholder="e.g. Laravel">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kategori</label>
                    <input type="text" name="category" class="form-control" value="{{ old('category') }}" placeholder="e.g. Backend">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Level</label>
                    <select name="level" class="form-select" required>
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Deskripsikan pengalaman Anda dengan skill ini...">{{ old('description') }}</textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('student.skills.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
