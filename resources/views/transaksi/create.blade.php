@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h3>Daftar Transaksi</h3>

    <div class="card-body">
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf

            {{-- Pilihan barang --}}
            <div class="mb-3">
                <label class="form-label">Pilih Barang</label>
                <select class="form-select" name="barang_id" required>
                    <option value="" disabled selected>Pilih barang</option>
                    @foreach ($barangs as $b)
                        <option value="{{ $b->id }}">
                            {{ $b->nama_barang }} ({{ $b->harga }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Diskon --}}
            <div class="mb-3">
                <label for="diskon" class="form-label">Diskon (%)</label>
                <input type="number" class="form-control" id="diskon" name="diskon" value="0" min="0" max="100" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection