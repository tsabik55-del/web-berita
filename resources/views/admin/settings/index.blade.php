@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0" style="color: #333; font-weight: 700;">Pengaturan <span style="color: #d4af37;">Sistem</span></h1>
</div>

<!-- Alert Success Mock -->
@if (request()->has('save'))
<div class="alert alert-success alert-dismissible fade show bg-success text-white border-0" role="alert" style="border-radius: 10px;">
    <strong>Sukses!</strong> Pengaturan website berhasil diperbarui.
    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col-lg-8">
        <!-- Form Card -->
        <div class="card shadow mb-4 bg-dark text-white" style="border: 1px solid #2a2a2a; border-radius: 10px;">
            <div class="card-header py-3 bg-dark" style="border-bottom: 1px solid #2a2a2a; border-radius: 10px 10px 0 0;">
                <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Identitas Web Berita</h6>
            </div>
            <div class="card-body">
                <form action="?save=1" method="POST">
                    @csrf

                    <!-- Nama Website -->
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" style="color: #d4af37;">Nama Website</label>
                        <input type="text" class="form-control bg-dark text-white" name="site_name" value="Web Berita" style="border: 1px solid #444; border-radius: 8px;">
                    </div>

                    <!-- Slogan -->
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" style="color: #d4af37;">Tagline / Slogan</label>
                        <input type="text" class="form-control bg-dark text-white" name="site_tagline" value="Portal Berita Terkini, Akurat, dan Terpercaya" style="border: 1px solid #444; border-radius: 8px;">
                    </div>

                    <!-- Meta Deskripsi -->
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" style="color: #d4af37;">Meta Deskripsi SEO</label>
                        <textarea class="form-control bg-dark text-white" name="site_meta" rows="3" style="border: 1px solid #444; border-radius: 8px;">Dapatkan berita terbaru dari dalam dan luar negeri seputar politik, teknologi, olahraga, hiburan, dan gaya hidup hanya di portal Web Berita terpercaya.</textarea>
                    </div>

                    <!-- Kontak Email -->
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" style="color: #d4af37;">Email Kontak Redaksi</label>
                        <input type="email" class="form-control bg-dark text-white" name="site_email" value="redaksi@webberita.com" style="border: 1px solid #444; border-radius: 8px;">
                    </div>

                    <hr style="border-top: 1px solid #333;" class="my-4">

                    <!-- Submit Buttons -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" style="border-radius: 20px; font-weight: 600; padding: 8px 24px; background-color: #d4af37 !important; border-color: #d4af37 !important; color: #1a1a1a !important;">Simpan Pengaturan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Informasi Tambahan Sidebar -->
    <div class="col-lg-4">
        <div class="card shadow bg-dark text-white mb-4" style="border: 1px solid #2a2a2a; border-radius: 10px;">
            <div class="card-header py-3 bg-dark" style="border-bottom: 1px solid #2a2a2a; border-radius: 10px 10px 0 0;">
                <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Status Lisensi</h6>
            </div>
            <div class="card-body text-center">
                <i class="fas fa-check-circle fa-4x mb-3" style="color: #d4af37;"></i>
                <h5 class="font-weight-bold text-white mb-1">Versi Professional</h5>
                <p class="text-white-50 small mb-0">Lisensi diaktifkan untuk redaksi akademik.</p>
            </div>
        </div>
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
