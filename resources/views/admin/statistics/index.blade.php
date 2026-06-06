@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0" style="color: #333; font-weight: 700;">Statistik & <span style="color: #d4af37;">Laporan</span></h1>
</div>

<div class="row">
    <!-- Total Berita -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow h-100 py-2 bg-dark" style="border-left: 4px solid #d4af37; border-radius: 10px;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #d4af37; letter-spacing: 1px;">
                            Total Berita Diterbitkan</div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ \App\Models\Product::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x" style="color: rgba(212, 175, 55, 0.4);"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Kategori -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow h-100 py-2 bg-dark" style="border-left: 4px solid #d4af37; border-radius: 10px;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #d4af37; letter-spacing: 1px;">
                            Total Kategori Berita</div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ \App\Models\Category::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder-open fa-2x" style="color: rgba(212, 175, 55, 0.4);"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Komentar -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow h-100 py-2 bg-dark" style="border-left: 4px solid #d4af37; border-radius: 10px;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #d4af37; letter-spacing: 1px;">
                            Total Komentar Masuk</div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ \App\Models\Comment::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x" style="color: rgba(212, 175, 55, 0.4);"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Breakdown per Kategori -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow bg-dark text-white" style="border: 1px solid #2a2a2a; border-radius: 10px;">
            <div class="card-header py-3 bg-dark" style="border-bottom: 1px solid #2a2a2a; border-radius: 10px 10px 0 0;">
                <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Penyebaran Berita per Kategori</h6>
            </div>
            <div class="card-body">
                @php
                    $categories = \App\Models\Category::withCount('products')->get();
                    $totalProducts = \App\Models\Product::count();
                @endphp

                @forelse ($categories as $cat)
                    @php
                        $percentage = $totalProducts > 0 ? round(($cat->products_count / $totalProducts) * 100) : 0;
                    @endphp
                    <h4 class="small font-weight-bold" style="color: #d4af37;">
                        {{ $cat->name }} <span class="float-right text-white-50">{{ $cat->products_count }} Berita ({{ $percentage }}%)</span>
                    </h4>
                    <div class="progress mb-4" style="background-color: #222; height: 10px;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%; background-color: #d4af37;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                @empty
                    <p class="text-white-50 mb-0">Belum ada kategori yang dibuat.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Sistem Info -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow bg-dark text-white" style="border: 1px solid #2a2a2a; border-radius: 10px;">
            <div class="card-header py-3 bg-dark" style="border-bottom: 1px solid #2a2a2a; border-radius: 10px 10px 0 0;">
                <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Informasi Sistem Web Berita</h6>
            </div>
            <div class="card-body">
                <table class="table text-white mb-0" style="border: none;">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold pl-0" style="color: #d4af37; border: none;">Laravel Version</td>
                            <td class="text-right" style="border: none;">{{ app()->version() }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold pl-0" style="color: #d4af37; border: none;">PHP Version</td>
                            <td class="text-right" style="border: none;">{{ phpversion() }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold pl-0" style="color: #d4af37; border: none;">Database Driver</td>
                            <td class="text-right" style="border: none;">SQLite (database.sqlite)</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold pl-0" style="color: #d4af37; border: none;">Waktu Server</td>
                            <td class="text-right" style="border: none;">{{ date('d M Y, H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
