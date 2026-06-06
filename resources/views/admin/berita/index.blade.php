@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0" style="color: #333; font-weight: 700;">Kelola <span style="color: #d4af37;">Berita</span></h1>
    <a href="{{ route('admin.berita.create') }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm text-dark" style="background-color: #d4af37; font-weight: 600; border-radius: 20px;">
        <i class="fas fa-plus fa-sm text-dark-50 mr-1"></i> Tambah Berita Baru
    </a>
</div>

<!-- Alert Success -->
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show bg-success text-white border-0" role="alert" style="border-radius: 10px;">
    <strong>Sukses!</strong> {{ session('success') }}
    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- Content Card -->
<div class="card shadow mb-4 bg-dark" style="border: 1px solid #2a2a2a; border-radius: 10px;">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-dark" style="border-bottom: 1px solid #2a2a2a; border-radius: 10px 10px 0 0;">
        <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Daftar Semua Berita</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-white" id="dataTable" width="100%" cellspacing="0" style="border: 1px solid #333;">
                <thead style="background-color: #222; color: #d4af37;">
                    <tr>
                        <th width="5%" class="text-center" style="border: 1px solid #333;">No</th>
                        <th style="border: 1px solid #333;">Judul Berita</th>
                        <th width="15%" style="border: 1px solid #333;">Kategori</th>
                        <th width="15%" class="text-center" style="border: 1px solid #333;">Tanggal Dibuat</th>
                        <th width="12%" class="text-center" style="border: 1px solid #333;">Status</th>
                        <th width="15%" class="text-center" style="border: 1px solid #333;">Aksi</th>
                    </tr>
                </thead>
                <tbody style="background-color: #1a1a1a;">
                    @forelse ($beritaList as $index => $berita)
                    <tr>
                        <td class="text-center" style="border: 1px solid #333; vertical-align: middle;">{{ $index + 1 }}</td>
                        <td style="border: 1px solid #333; vertical-align: middle; font-weight: 500;">{{ $berita->name }}</td>
                        <td style="border: 1px solid #333; vertical-align: middle; color: #d4af37;">{{ $berita->category->name ?? 'Tanpa Kategori' }}</td>
                        <td class="text-center" style="border: 1px solid #333; vertical-align: middle; font-size: 0.9rem;">
                            {{ $berita->created_at->format('d M Y, H:i') }}
                        </td>
                        <td class="text-center" style="border: 1px solid #333; vertical-align: middle;">
                            @if ($berita->is_active)
                                <span class="badge badge-success px-3 py-2" style="border-radius: 20px;">Diterbitkan</span>
                            @else
                                <span class="badge badge-secondary px-3 py-2" style="border-radius: 20px;">Draf</span>
                            @endif
                        </td>
                        <td class="text-center" style="border: 1px solid #333; vertical-align: middle;">
                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-sm btn-warning mr-1" style="border-radius: 5px; color: #1a1a1a; font-weight: 600; border: none; background-color: #d4af37;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 5px; border: none;">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4" style="border: 1px solid #333; color: rgba(212, 175, 55, 0.5);">
                            <i class="fas fa-newspaper fa-3x mb-3"></i>
                            <p class="mb-0 font-weight-bold">Belum ada berita yang diterbitkan.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
