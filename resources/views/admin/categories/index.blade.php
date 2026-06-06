@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0" style="color: #d4af37; font-weight: 700;">
        <i class="fas fa-tags mr-2"></i>Kelola Kategori
    </h1>
    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm mr-1"></i> Tambah Kategori
    </a>
</div>

<!-- Flash Messages -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-circle mr-1"></i> {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <i class="fas fa-info-circle mr-1"></i> {{ session('info') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- DataTable Card -->
<div class="card shadow mb-4" style="background-color: #222; border: 1px solid #333; border-radius: 10px;">
    <div class="card-header py-3" style="background-color: #222; border-bottom: 1px solid #333; border-radius: 10px 10px 0 0;">
        <h6 class="m-0 font-weight-bold" style="color: #d4af37;">Daftar Kategori</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: #ccc;">
                <thead style="background-color: #1a1a1a;">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Kategori</th>
                        <th>Slug</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
