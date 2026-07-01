@extends('layouts.app')
@section('title', 'Edit Skill')
@section('content')
<div class="card">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h5 class="fw-bold mb-0">Edit Skill</h5>
    </div>
    <div class="card-body px-4 pb-4">
        <form method="POST" action="{{ route('student.skills.update', $skill->id) }}">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Skill</label>
                    <input type="text" name="skill_name" class="form-control" value="{{ old('skill_name', $skill->skill_name) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kategori</label>
                    <input type="text" name="category" class="form-control" value="{{ old('category', $skill->category) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Level</label>
                    <select name="level" class="form-select">
                        <option value="Beginner" {{ $skill->level == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                        <option value="Intermediate" {{ $skill->level == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                        <option value="Advanced" {{ $skill->level == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $skill->description) }}</textarea>
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
