@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0" style="color: #d4af37; font-weight: 700;">
        <i class="fas fa-user-edit mr-2"></i>Edit Pengguna
    </h1>
    <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm mr-1"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4" style="background-color: #222; border: 1px solid #333; border-radius: 10px;">
    <div class="card-header py-3" style="background-color: #222; border-bottom: 1px solid #333; border-radius: 10px 10px 0 0;">
        <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Edit Data Pengguna</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" style="color: #d4af37;">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Masukkan nama lengkap"
                       style="background-color: #1a1a1a; border-color: #333; color: #ccc;">
                @error('name')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" style="color: #d4af37;">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Masukkan email"
                       style="background-color: #1a1a1a; border-color: #333; color: #ccc;">
                @error('email')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" style="color: #d4af37;">Password <small class="text-muted">(kosongkan jika tidak ingin mengubah)</small></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       id="password" name="password" placeholder="Masukkan password baru"
                       style="background-color: #1a1a1a; border-color: #333; color: #ccc;">
                @error('password')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" style="color: #d4af37;">Konfirmasi Password</label>
                <input type="password" class="form-control"
                       id="password_confirmation" name="password_confirmation" placeholder="Ulangi password baru"
                       style="background-color: #1a1a1a; border-color: #333; color: #ccc;">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save mr-1"></i> Perbarui
            </button>
        </form>
    </div>
</div>
@endsection
