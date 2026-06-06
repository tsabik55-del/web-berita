@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0" style="color: #333; font-weight: 700;">Dashboard <span style="color: #d4af37;">Overview</span></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm shadow-sm text-dark" style="background-color: #d4af37; font-weight: 600;">
        <i class="fas fa-download fa-sm text-dark-50"></i> Generate Report
    </a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Total Berita Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 py-2 bg-dark" style="border-left: 4px solid #d4af37; border-radius: 10px;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #d4af37; letter-spacing: 1px;">
                            Total Berita</div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ \App\Models\Product::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x" style="color: rgba(212, 175, 55, 0.4);"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kategori Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 py-2 bg-dark" style="border-left: 4px solid #d4af37; border-radius: 10px;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #d4af37; letter-spacing: 1px;">
                            Kategori</div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ \App\Models\Category::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder-open fa-2x" style="color: rgba(212, 175, 55, 0.4);"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Komentar Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 py-2 bg-dark" style="border-left: 4px solid #d4af37; border-radius: 10px;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #d4af37; letter-spacing: 1px;">
                            Komentar Masuk</div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ \App\Models\Comment::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x" style="color: rgba(212, 175, 55, 0.4);"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pengunjung Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 py-2 bg-dark" style="border-left: 4px solid #d4af37; border-radius: 10px;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #d4af37; letter-spacing: 1px;">
                            Total Pengguna</div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ \App\Models\User::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x" style="color: rgba(212, 175, 55, 0.4);"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4 bg-dark" style="border: 1px solid #2a2a2a; border-radius: 10px;">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-dark" style="border-bottom: 1px solid #2a2a2a; border-radius: 10px 10px 0 0;">
                <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Statistik Kunjungan & Aktivitas</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw" style="color: #d4af37;"></i>
                    </a>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area d-flex align-items-center justify-content-center" style="height: 320px; border: 1px dashed rgba(212, 175, 55, 0.3); border-radius: 8px;">
                    <div class="text-center">
                        <i class="fas fa-chart-area fa-3x mb-3" style="color: rgba(212, 175, 55, 0.2);"></i>
                        <p class="text-white-50 mb-0">Grafik statistik akan diaktifkan seiring aktivitas redaksi berjalan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart / Latest News -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4 bg-dark" style="border: 1px solid #2a2a2a; border-radius: 10px;">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-dark" style="border-bottom: 1px solid #2a2a2a; border-radius: 10px 10px 0 0;">
                <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Berita Terbaru</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @forelse (\App\Models\Product::orderBy('created_at', 'desc')->take(3)->get() as $item)
                <div class="mb-3 p-3" style="background-color: #222; border-radius: 8px; border-left: 3px solid #d4af37;">
                    <div class="small" style="color: #d4af37;">{{ $item->created_at->diffForHumans() }}</div>
                    <div class="text-white mt-1" style="font-weight: 500;">{{ $item->name }}</div>
                </div>
                @empty
                <div class="text-center py-4">
                    <p class="text-white-50 mb-0">Belum ada berita diterbitkan.</p>
                </div>
                @endforelse
                
                <div class="mt-4 text-center">
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-warning w-100" style="color: #d4af37; border-color: #d4af37; border-radius: 20px;">Lihat Semua Berita <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
