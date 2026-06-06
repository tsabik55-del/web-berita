@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0" style="color: #d4af37; font-weight: 700;">
        <i class="fas fa-edit mr-2"></i>Edit Kategori
    </h1>
    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm mr-1"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4" style="background-color: #222; border: 1px solid #333; border-radius: 10px;">
    <div class="card-header py-3" style="background-color: #222; border-bottom: 1px solid #333; border-radius: 10px 10px 0 0;">
        <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Edit Data Kategori</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" style="color: #d4af37;">Nama Kategori</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       id="name" name="name" value="{{ old('name', $category->name) }}" placeholder="Masukkan nama kategori"
                       style="background-color: #1a1a1a; border-color: #333; color: #ccc;">
                <small class="form-text text-muted">Slug kategori akan otomatis diperbarui berdasarkan nama kategori.</small>
                @error('name')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save mr-1"></i> Perbarui
            </button>
        </form>
    </div>
</div>
@endsection
