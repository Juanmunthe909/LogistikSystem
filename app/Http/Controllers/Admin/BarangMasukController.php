<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\StokBarang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BarangMasukController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Melakukan pencarian barang keluar berdasarkan kode barang, tujuan, atau tanggal keluar
            $barangMasuk = BarangMasuk::where('kode_barang', 'like', '%' . $request->keyword . '%')
                ->orWhere('destination', 'like', '%' . $request->keyword . '%')
                ->orWhere('tanggal_masuk', 'like', '%' . $request->keyword . '%')
                ->paginate(10); // Menggunakan paginasi 10 data per halaman
            return view('pages.admin.barangmasuk.list', compact('barangMasuk'));
        }
        return view('pages.admin.barangmasuk.main');
    }

    public function create()
    {
        // Menampilkan halaman untuk menambah barang keluar
        return view('pages.admin.barangmasuk.create');
    }

    public function store(Request $request)
    {
        // Validasi input pengguna
        $validators = Validator::make($request->all(), [
            'title' => 'required|string',
            'kode_barang' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'destination' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
        ]);

        if ($validators->fails()) {
            // Jika validasi gagal, kembalikan pesan error
            return response()->json([
                'status' => 'error',
                'message' => $validators->errors()->first(),
            ]);
        }

        // // Menyimpan file cover jika ada
        // $file = $request->file('cover');
        // $filename = $file->getClientOriginalName();
        // $file->move('images/barangmasuk', $filename);

        // // Cek atau buat stok barang baru jika kode barang belum ada
        // $stock = StokBarang::firstOrCreate(
        //     ['title' => $request->title],
        //     ['kode_barang' => $request->kode_barang],
        //     ['stock' => 0] // Set stok awal jika barang belum ada
        // );

        // // Cek apakah stok cukup untuk quantity yang keluar
        // if ($stok->stok >= $request->quantity) {
        //     $stok->decrement('stok', $request->quantity); // Kurangi stok yang keluar
        // } else {
        //     // Jika stok tidak cukup, kembalikan pesan error
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Stok tidak cukup',
        //     ]);
        // }

        // Simpan data barang masuk
        BarangMasuk::create([
            'title' => $request->title,
            'kode_barang' => $request->kode_barang,
            'quantity' => $request->quantity,
            'destination' => $request->destination,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        // Kembalikan response sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menambahkan barang masuk',
            'redirect' => route('admin.barangmasuk.index')
        ]);
    }

    public function show(BarangMasuk $barangmasuk)
    {
        // Menampilkan detail barang masuk
        return view('pages.admin.barangmasuk.show', compact('barangMasuk'));
    }

    public function edit(BarangMasuk $barangmasuk)
    {
        // Menampilkan halaman untuk mengedit barang masuk
        return view('pages.admin.barangmasuk.edit', compact('barangMasuk'));
    }

    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        // Validasi input pengguna
        $validators = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'destination' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
        ]);

        if ($validators->fails()) {
            // Jika validasi gagal, kembalikan pesan error
            return response()->json([
                'status' => 'error',
                'message' => $validators->errors()->first(),
            ]);
        }

        // $filename = $barangmasuk->cover;
        // if ($request->hasFile('cover')) {
        //     // Hapus file lama jika ada file cover baru
        //     $old_file = public_path('images/barangmasuk/' . $barangmasuk->cover);
        //     if (file_exists($old_file)) {
        //         unlink($old_file);
        //     }
        //     // Upload file cover baru
        //     $file = $request->file('cover');
        //     $filename = $file->getClientOriginalName();
        //     $file->move('images/barangmasuk', $filename);
        // }

        // Update data barang keluar
        $barangMasuk->update([
            'title' => $request->title,
            'kode_barang' => $request->kode_barang,
            'quantity' => $request->quantity,
            'destination' => $request->destination,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        // Kembalikan response sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengubah data barang masuk',
            'redirect' => route('admin.barangmasuk.index')
        ]);
    }

    public function destroy(BarangMasuk $barangMasuk)
    {
        // // Menghapus file cover jika ada
        // $file = public_path('images/barangmasuk/' . $barangmasuk->cover);
        // if (file_exists($file)) {
        //     unlink($file);
        // }

        // Menghapus data barang masuk
        $barangMasuk->delete();

        // Kembalikan response sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus barang masuk',
        ]);
    }
}
