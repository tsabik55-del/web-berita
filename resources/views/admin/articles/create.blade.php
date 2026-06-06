@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0" style="color: #d4af37; font-weight: 700;">
        <i class="fas fa-plus mr-2"></i>Tambah Berita
    </h1>
    <a href="{{ route('articles.index') }}" class="btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm mr-1"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4" style="background-color: #222; border: 1px solid #333; border-radius: 10px;">
    <div class="card-header py-3" style="background-color: #222; border-bottom: 1px solid #333; border-radius: 10px 10px 0 0;">
        <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Form Berita Baru</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Judul Berita (col-md-8) -->
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title" style="color: #d4af37;">Judul Berita</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                               id="title" name="title" value="{{ old('title') }}" placeholder="Masukkan judul berita (min. 10 karakter)"
                               style="background-color: #1a1a1a; border-color: #333; color: #ccc;">
                        @error('title')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <!-- Kategori dropdown (col-md-4) -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category_id" style="color: #d4af37;">Kategori</label>
                        <select class="form-control @error('category_id') is-invalid @enderror"
                                id="category_id" name="category_id"
                                style="background-color: #1a1a1a; border-color: #333; color: #ccc;">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Textarea Isi Berita (rows=10) -->
            <div class="form-group">
                <label for="content" style="color: #d4af37;">Isi Berita</label>
                <textarea class="form-control @error('content') is-invalid @enderror"
                          id="content" name="content" rows="10" placeholder="Tulis isi berita di sini..."
                          style="background-color: #1a1a1a; border-color: #333; color: #ccc;">{{ old('content') }}</textarea>
                @error('content')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save mr-1"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endsection
