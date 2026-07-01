@extends('layouts.app')
@section('title', 'Edit Sertifikat')
@section('content')
<div class="card">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h5 class="fw-bold mb-0">Edit Sertifikat</h5>
    </div>
    <div class="card-body px-4 pb-4">
        <form method="POST" action="{{ route('student.certificates.update', $certificate->id) }}">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Sertifikat</label>
                    <input type="text" name="certificate_name" class="form-control" value="{{ old('certificate_name', $certificate->certificate_name) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Penyelenggara</label>
                    <input type="text" name="organizer" class="form-control" value="{{ old('organizer', $certificate->organizer) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tanggal Terbit</label>
                    <input type="date" name="issue_date" class="form-control" value="{{ old('issue_date', $certificate->issue_date->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Masa Berlaku</label>
                    <input type="date" name="expiry_date" class="form-control" value="{{ old('expiry_date', $certificate->expiry_date?->format('Y-m-d')) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">URL Kredensial</label>
                    <input type="url" name="credential_url" class="form-control" value="{{ old('credential_url', $certificate->credential_url) }}">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('student.certificates.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
