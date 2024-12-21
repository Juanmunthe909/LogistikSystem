<?php

namespace App\Http\Controllers\Admin;

use App\Models\StokBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StokBarangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Melakukan pencarian stok barang berdasarkan kode barang atau title
            $stokBarang = StokBarang::where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('kode_barang', 'like', '%' . $request->keyword . '%')
                ->orWhere('stock', 'like', '%' . $request->keyword . '%')
                ->paginate(10); // Menggunakan paginasi 10 data per halaman
            return view('pages.admin.stokbarang.list', compact('stokBarang'));
        }
        return view('pages.admin.stokbarang.main');
    }

    public function create()
    {
        // Menampilkan halaman untuk menambah stok barang
        return view('pages.admin.stokbarang.create');
    }

    public function store(Request $request)
    {
        // Validasi input pengguna
        $validators = Validator::make($request->all(), [
            'title' => 'required|string|max:255|',
            'kode_barang' => 'required|string|max:255|',
            'stock' => 'required|integer',
        ]);

        if ($validators->fails()) {
            // Jika validasi gagal, kembalikan pesan error
            return response()->json([
                'status' => 'error',
                'message' => $validators->errors()->first(),
            ]);
        }

        // Simpan data stok barang
        StokBarang::create([
            'title' => $request->title,
            'kode_barang' => $request->kode_barang,
            'stock' => $request->stock,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menambahkan produk baru',
            'redirect' => route('admin.stokbarang.index')
        ]);
    }


    public function show(StokBarang $stokBarang)
    {
        // Menampilkan detail stok barang
        return view('pages.admin.stokbarang.show', compact('stokBarang'));
    }

    public function edit(StokBarang $stokBarang)
    {
        // Menampilkan halaman untuk mengedit stok barang
        return view('pages.admin.stokbarang.edit', compact('stokBarang'));
    }

    public function update(Request $request, StokBarang $stokBarang)
    {
        // Validasi input pengguna
        $validators = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255|unique:stok_barang,kode_barang,' . $stokBarang->id,
            'stock' => 'required|integer|',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validators->errors()->first(),
            ]);
        }

        // Update data stok barang
        $stokBarang->update([
            'title' => $request->title,
            'kode_barang' => $request->kode_barang,
            'stock' => $request->stock,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengubah data stok barang',
            'redirect' => route('admin.stokbarang.index')
        ]);
    }


    public function destroy(StokBarang $stokBarang)
    {
        // Menghapus data stok barang
        $stokBarang->delete();

        // Kembalikan response sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus stok barang',
        ]);
    }
}
