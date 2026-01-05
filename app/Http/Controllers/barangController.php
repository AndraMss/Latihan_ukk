<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

class barangController extends Controller
{
    public function index() {
        $barangs = barang::latest()->paginate(10);
        return view('barang.index', compact('barangs'));
    }

    public function create() {
        return view('barang.create');
    }

    public function store(Request $request) {
        $request->validate([
            'kode_barang' => 'required|max:50',
            'nama_barang' => 'required|max:100',
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|integer|min:0',
            'keterangan' => 'nullable',
        ]);

        barang::create($request->all());
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dibuat.');
    }

    public function show(barang $barang) {
        return view('barang.show', compact('barang'));
    }

    public function edit(string $id) {
        $barang = barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, string $id) {
        $barang = barang::findOrFail($id);  
        $request->validate([
            'kode_barang' => 'required|max:50|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang' => 'required|max:100',
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|integer|min:0',
            'keterangan' => 'nullable',
        ]);

        $barang->update($request->all());
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id) {
        $barang = barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}