@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Daftar Barang</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('transaksi.create') }}" class="btn btn-info mb-3">Diskon</a>
    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $index => $b)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $b->nama_barang }}</td>
                    <td>Rp {{ number_format($b->harga, 2, ',', '.') }}</td>
                    <td>{{ $b->stok }}</td>
                    <td>{{ $b->keterangan }}</td>
                    <td>
                        <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('barang.show', $b->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <form action="{{ route('barang.destroy', $b->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
    </table>
</div>
@endsection


<!-- <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">📦 Daftar Barang</h3>
        <a href="{{ route('barang.create') }}" class="btn btn-primary shadow-sm">
            + Tambah Barang
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Keterangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $index => $b)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $b->nama_barang }}</td>
                            <td>Rp {{ number_format($b->harga, 2, ',', '.') }}</td>
                            <td>
                                @if ($b->stok <= 5)
                                    <span class="badge bg-danger">Sisa {{ $b->stok }}</span>
                                @elseif ($b->stok <= 10)
                                    <span class="badge bg-warning text-dark">Sisa {{ $b->stok }}</span>
                                @else
                                    <span class="badge bg-success">Tersedia ({{ $b->stok }})</span>
                                @endif
                            </td>
                            <td>{{ $b->keterangan }}</td>
                            <td class="text-center">
                                <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning btn-sm me-1 shadow-sm">
                                    Edit
                                </a>

                                <a href="{{ route('barang.show', $b->id) }}" class="btn btn-info btn-sm me-1 shadow-sm text-white">
                                    Lihat
                                </a>

                                <form action="{{ route('barang.destroy', $b->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" 
                                        class="btn btn-danger btn-sm shadow-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($barangs->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                Tidak ada data barang.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div> -->