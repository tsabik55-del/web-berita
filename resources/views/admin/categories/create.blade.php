@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0" style="color: #333; font-weight: 700;">Tambah <span style="color: #d4af37;">Kategori</span></h1>
    <a href="{{ route('admin.kategori.index') }}" class="btn btn-sm btn-outline-warning text-dark border-warning" style="font-weight: 600; border-radius: 20px; border-color: #d4af37; background-color: #d4af37;">
        <i class="fas fa-arrow-left fa-sm mr-1"></i> Kembali ke Daftar
    </a>
</div>

<!-- Form Card -->
<div class="card shadow mb-4 bg-dark text-white" style="border: 1px solid #2a2a2a; border-radius: 10px;">
    <div class="card-header py-3 bg-dark" style="border-bottom: 1px solid #2a2a2a; border-radius: 10px 10px 0 0;">
        <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Formulir Tambah Kategori Baru</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.kategori.store') }}" method="POST">
            @csrf

            <!-- Nama Kategori -->
            <div class="form-group mb-4">
                <label for="name" class="font-weight-bold" style="color: #d4af37;">Nama Kategori</label>
                <input type="text" class="form-control bg-dark text-white @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Tuliskan nama kategori (contoh: Politik, Olahraga)..." style="border: 1px solid #444; border-radius: 8px;">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="form-group mb-4">
                <label for="description" class="font-weight-bold" style="color: #d4af37;">Deskripsi Kategori</label>
                <textarea class="form-control bg-dark text-white @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Tulis deskripsi singkat mengenai kategori ini..." style="border: 1px solid #444; border-radius: 8px;">{{ old('description') }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <hr style="border-top: 1px solid #333;" class="my-4">

            <!-- Submit Buttons -->
            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-secondary mr-2" style="border-radius: 20px; font-weight: 600; padding: 8px 24px;">Reset</button>
                <button type="submit" class="btn btn-primary" style="border-radius: 20px; font-weight: 600; padding: 8px 24px; background-color: #d4af37 !important; border-color: #d4af37 !important; color: #1a1a1a !important;">Simpan Kategori</button>
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
</style>
@endsection
