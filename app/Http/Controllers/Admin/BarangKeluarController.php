<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use App\Models\StokBarang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BarangKeluarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Melakukan pencarian barang keluar berdasarkan kode barang, tujuan, atau tanggal keluar
            $barangKeluar = BarangKeluar::where('kode_barang', 'like', '%' . $request->keyword . '%')
                ->orWhere('destination', 'like', '%' . $request->keyword . '%')
                ->orWhere('tanggal_keluar', 'like', '%' . $request->keyword . '%')
                ->paginate(10); // Menggunakan paginasi 10 data per halaman
            return view('pages.admin.barangkeluar.list', compact('barangKeluar'));
        }
        return view('pages.admin.barangkeluar.main');
    }

    public function create()
    {
        // Menampilkan halaman untuk menambah barang keluar
        return view('pages.admin.barangkeluar.create');
    }

    public function store(Request $request)
    {
        // Validasi input pengguna
        $validators = Validator::make($request->all(), [
            'title' => 'required|string',
            'kode_barang' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'destination' => 'required|string|max:255',
            'tanggal_keluar' => 'required|date',
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
        // $file->move('images/barangkeluar', $filename);

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

        // Simpan data barang keluar
        BarangKeluar::create([
            'title' => $request->title,
            'kode_barang' => $request->kode_barang,
            'quantity' => $request->quantity,
            'destination' => $request->destination,
            'tanggal_keluar' => $request->tanggal_keluar,
        ]);

        // Kembalikan response sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menambahkan barang keluar',
            'redirect' => route('admin.barangkeluar.index')
        ]);
    }

    public function show(BarangKeluar $barangKeluar)
    {
        // Menampilkan detail barang keluar
        return view('pages.admin.barangkeluar.show', compact('barangKeluar'));
    }

    public function edit(BarangKeluar $barangKeluar)
    {
        // Menampilkan halaman untuk mengedit barang keluar
        return view('pages.admin.barangkeluar.edit', compact('barangKeluar'));
    }

    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        // Validasi input pengguna
        $validators = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'destination' => 'required|string|max:255',
            'tanggal_keluar' => 'required|date',
        ]);

        if ($validators->fails()) {
            // Jika validasi gagal, kembalikan pesan error
            return response()->json([
                'status' => 'error',
                'message' => $validators->errors()->first(),
            ]);
        }

        // $filename = $barangKeluar->cover;
        // if ($request->hasFile('cover')) {
        //     // Hapus file lama jika ada file cover baru
        //     $old_file = public_path('images/barangkeluar/' . $barangKeluar->cover);
        //     if (file_exists($old_file)) {
        //         unlink($old_file);
        //     }
        //     // Upload file cover baru
        //     $file = $request->file('cover');
        //     $filename = $file->getClientOriginalName();
        //     $file->move('images/barangkeluar', $filename);
        // }

        // Update data barang keluar
        $barangKeluar->update([
            'title' => $request->title,
            'kode_barang' => $request->kode_barang,
            'quantity' => $request->quantity,
            'destination' => $request->destination,
            'tanggal_keluar' => $request->tanggal_keluar,
        ]);

        // Kembalikan response sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengubah data barang keluar',
            'redirect' => route('admin.barangkeluar.index')
        ]);
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        // // Menghapus file cover jika ada
        // $file = public_path('images/barangkeluar/' . $barangKeluar->cover);
        // if (file_exists($file)) {
        //     unlink($file);
        // }

        // Menghapus data barang keluar
        $barangKeluar->delete();

        // Kembalikan response sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus barang keluar',
        ]);
    }
}
