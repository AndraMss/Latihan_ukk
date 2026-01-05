@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Diskon (%)</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $index => $t)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <!-- Nama barang dari relasi -->
                            <td>{{ $t->barang->nama_barang ?? '-' }}</td>
                            <td>Rp {{ number_format($t->harga, 0, ',', '.') }}</td>
                            <td>{{ $t->diskon }}</td>
                            <td>Rp {{ number_format($t->total_harga, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus transaksi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-3">Belum ada data transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection