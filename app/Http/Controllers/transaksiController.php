<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\transaksi;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function index() {
        $transaksis = transaksi::with('barang')->latest()->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create() {
        $barangs = barang::all();
        return view('transaksi.create', compact('barangs'));
    }

    public function store(Request $request) {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'diskon' => 'nullable|numeric|min:0|max:100',
        ]);
        $barang = barang::find($request->barang_id);
        $harga = $barang->harga;
        $diskon = $request->diskon;
        $total_harga = $harga - ($harga * ($diskon / 100));

        transaksi::create([
            'barang_id' => $barang->id,
            'harga' => $harga,
            'diskon' => $diskon,
            'total_harga' => $total_harga,
        ]);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat.');
    }

    public function destroy(transaksi $transaksi) {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');

    }
}

