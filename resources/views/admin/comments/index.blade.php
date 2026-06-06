@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0" style="color: #333; font-weight: 700;">Moderasi <span style="color: #d4af37;">Komentar</span></h1>
</div>

<!-- Alert Messages -->
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
    <div class="card-header py-3 bg-dark" style="border-bottom: 1px solid #2a2a2a; border-radius: 10px 10px 0 0;">
        <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Daftar Komentar Berita</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-white" id="dataTable" width="100%" cellspacing="0" style="border: 1px solid #333;">
                <thead style="background-color: #222; color: #d4af37;">
                    <tr>
                        <th width="5%" class="text-center" style="border: 1px solid #333;">No</th>
                        <th width="20%" style="border: 1px solid #333;">Nama & Email</th>
                        <th style="border: 1px solid #333;">Komentar</th>
                        <th width="20%" style="border: 1px solid #333;">Berita Terkait</th>
                        <th width="12%" class="text-center" style="border: 1px solid #333;">Status</th>
                        <th width="15%" class="text-center" style="border: 1px solid #333;">Aksi</th>
                    </tr>
                </thead>
                <tbody style="background-color: #1a1a1a;">
                    @forelse ($comments as $index => $comment)
                    <tr>
                        <td class="text-center" style="border: 1px solid #333; vertical-align: middle;">{{ $index + 1 }}</td>
                        <td style="border: 1px solid #333; vertical-align: middle;">
                            <div class="font-weight-bold" style="color: #d4af37;">{{ $comment->name }}</div>
                            <div class="small text-white-50" style="font-size: 0.8rem;">{{ $comment->email }}</div>
                        </td>
                        <td style="border: 1px solid #333; vertical-align: middle; color: #ddd; font-style: italic;">
                            "{{ $comment->comment }}"
                        </td>
                        <td style="border: 1px solid #333; vertical-align: middle; color: #aaa;">
                            {{ $comment->product->name ?? 'Komentar Umum' }}
                        </td>
                        <td class="text-center" style="border: 1px solid #333; vertical-align: middle;">
                            @if ($comment->is_approved)
                                <span class="badge badge-success px-3 py-2" style="border-radius: 20px;">Disetujui</span>
                            @else
                                <span class="badge badge-warning px-3 py-2 text-dark" style="border-radius: 20px; background-color: #ffc107;">Menunggu</span>
                            @endif
                        </td>
                        <td class="text-center" style="border: 1px solid #333; vertical-align: middle;">
                            @if (!$comment->is_approved)
                            <form action="{{ route('admin.komentar.approve', $comment->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success mr-1" style="border-radius: 5px; border: none; font-weight: 600;">
                                    <i class="fas fa-check"></i> Setujui
                                </button>
                            </form>
                            @endif
                            <form action="{{ route('admin.komentar.destroy', $comment->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus komentar ini?')">
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
                            <i class="fas fa-comments fa-3x mb-3"></i>
                            <p class="mb-0 font-weight-bold">Belum ada komentar masuk.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
