@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0" style="color: #333; font-weight: 700;">Edit <span style="color: #d4af37;">Berita</span></h1>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-warning text-dark border-warning" style="font-weight: 600; border-radius: 20px; border-color: #d4af37; background-color: #d4af37;">
        <i class="fas fa-arrow-left fa-sm mr-1"></i> Kembali ke Daftar
    </a>
</div>

<!-- Form Card -->
<div class="card shadow mb-4 bg-dark text-white" style="border: 1px solid #2a2a2a; border-radius: 10px;">
    <div class="card-header py-3 bg-dark" style="border-bottom: 1px solid #2a2a2a; border-radius: 10px 10px 0 0;">
        <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Formulir Edit Berita</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Judul Berita -->
            <div class="form-group mb-4">
                <label for="name" class="font-weight-bold" style="color: #d4af37;">Judul Berita</label>
                <input type="text" class="form-control bg-dark text-white @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $berita->name) }}" placeholder="Tuliskan judul berita..." style="border: 1px solid #444; border-radius: 8px;">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Kategori -->
            <div class="form-group mb-4">
                <label for="category_id" class="font-weight-bold" style="color: #d4af37;">Kategori Berita</label>
                <select class="form-control bg-dark text-white @error('category_id') is-invalid @enderror" id="category_id" name="category_id" style="border: 1px solid #444; border-radius: 8px;">
                    <option value="" disabled>Pilih Kategori...</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $berita->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Isi Berita -->
            <div class="form-group mb-4">
                <label for="description" class="font-weight-bold" style="color: #d4af37;">Isi Berita</label>
                <textarea class="form-control bg-dark text-white @error('description') is-invalid @enderror" id="description" name="description" rows="10" placeholder="Tulis konten berita lengkap..." style="border: 1px solid #444; border-radius: 8px;">{{ old('description', $berita->description) }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Status Penerbitan -->
            <div class="form-group mb-4">
                <label class="font-weight-bold d-block" style="color: #d4af37;">Status Publikasi</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ $berita->is_active ? 'checked' : '' }}>
                    <label class="custom-control-label text-white-50" for="is_active">Terbitkan berita ini ke publik</label>
                </div>
            </div>

            <hr style="border-top: 1px solid #333;" class="my-4">

            <!-- Submit Buttons -->
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary mr-2" style="border-radius: 20px; font-weight: 600; padding: 8px 24px;">Batal</a>
                <button type="submit" class="btn btn-primary" style="border-radius: 20px; font-weight: 600; padding: 8px 24px; background-color: #d4af37 !important; border-color: #d4af37 !important; color: #1a1a1a !important;">Simpan Perubahan</button>
            </div>

        </form>
    </div>
</div>

<style>
    .form-control:focus {
        background-color: #1e1e1e !important;
        color: #fff !important;
        border-color: #d4af37 !important;
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25) !important;
    }
    .custom-control-input:checked ~ .custom-control-label::before {
        border-color: #d4af37 !important;
        background-color: #d4af37 !important;
    }
</style>
@endsection
