@extends('layouts.app')
@section('title', 'Edit Reward')
@section('content')
<div class="card">
    <div class="card-header bg-white border-0 pt-3 px-4">
        <h5 class="fw-bold mb-0">Edit Reward</h5>
    </div>
    <div class="card-body px-4 pb-4">
        <form action="{{ route('admin.rewards.update', $reward->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Judul Reward <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $reward->title) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control" required>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ (old('category_id', $reward->category_id) == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $reward->description) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Poin Dibutuhkan <span class="text-danger">*</span></label>
                    <input type="number" name="required_points" class="form-control" value="{{ old('required_points', $reward->required_points) }}" min="0" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Stok <span class="text-danger">*</span></label>
                    <input type="number" name="stock" class="form-control" value="{{ old('stock', $reward->stock) }}" min="0" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control" required>
                        <option value="active" {{ old('status', $reward->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $reward->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="image" class="form-control" accept="image/jpeg,image/png">
                    @if($reward->image)
                    <small class="text-secondary">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    @endif
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.rewards.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
