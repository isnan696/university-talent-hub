@extends('layouts.app')
@section('title', 'Tambah Portfolio')
@section('content')
<div class="card">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h5 class="fw-bold mb-0">Tambah Portfolio Baru</h5>
    </div>
    <div class="card-body px-4 pb-4">
        <form method="POST" action="{{ route('student.portfolios.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Judul Proyek</label>
                    <input type="text" name="project_title" class="form-control" value="{{ old('project_title') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="project_description" class="form-control" rows="4" required>{{ old('project_description') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">GitHub URL</label>
                    <input type="url" name="github_url" class="form-control" value="{{ old('github_url') }}" placeholder="https://github.com/user/project">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Demo URL</label>
                    <input type="url" name="project_url" class="form-control" value="{{ old('project_url') }}" placeholder="https://demo.example.com">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('student.portfolios.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
