@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0" style="color: #333; font-weight: 700;">Kelola <span style="color: #d4af37;">Pengguna</span></h1>
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
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show bg-danger text-white border-0" role="alert" style="border-radius: 10px;">
    <strong>Error!</strong> {{ session('error') }}
    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- Content Card -->
<div class="card shadow mb-4 bg-dark" style="border: 1px solid #2a2a2a; border-radius: 10px;">
    <div class="card-header py-3 bg-dark" style="border-bottom: 1px solid #2a2a2a; border-radius: 10px 10px 0 0;">
        <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Daftar Pengguna Sistem</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-white" id="dataTable" width="100%" cellspacing="0" style="border: 1px solid #333;">
                <thead style="background-color: #222; color: #d4af37;">
                    <tr>
                        <th width="5%" class="text-center" style="border: 1px solid #333;">No</th>
                        <th style="border: 1px solid #333;">Nama Pengguna</th>
                        <th style="border: 1px solid #333;">Alamat Email</th>
                        <th width="20%" class="text-center" style="border: 1px solid #333;">Tanggal Bergabung</th>
                        <th width="15%" class="text-center" style="border: 1px solid #333;">Peran (Role)</th>
                        <th width="15%" class="text-center" style="border: 1px solid #333;">Aksi</th>
                    </tr>
                </thead>
                <tbody style="background-color: #1a1a1a;">
                    @foreach ($users as $index => $user)
                    <tr>
                        <td class="text-center" style="border: 1px solid #333; vertical-align: middle;">{{ $index + 1 }}</td>
                        <td style="border: 1px solid #333; vertical-align: middle; font-weight: 500;">{{ $user->name }}</td>
                        <td style="border: 1px solid #333; vertical-align: middle;">{{ $user->email }}</td>
                        <td class="text-center" style="border: 1px solid #333; vertical-align: middle;">
                            {{ $user->created_at->format('d M Y') }}
                        </td>
                        <td class="text-center" style="border: 1px solid #333; vertical-align: middle;">
                            @if ($user->id === auth()->id())
                                <span class="badge badge-warning px-3 py-2 text-dark font-weight-bold" style="border-radius: 20px; background-color: #d4af37;">Administrator (Anda)</span>
                            @else
                                <span class="badge badge-light px-3 py-2 text-dark" style="border-radius: 20px;">Penulis (Author)</span>
                            @endif
                        </td>
                        <td class="text-center" style="border: 1px solid #333; vertical-align: middle;">
                            @if ($user->id !== auth()->id())
                            <form action="{{ route('admin.pengguna.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 5px; border: none;">
                                    <i class="fas fa-trash-alt"></i> Hapus Akun
                                </button>
                            </form>
                            @else
                                <span class="text-white-50 small">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
