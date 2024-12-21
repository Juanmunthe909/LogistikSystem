<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;

class StokBarang extends Model
{
    use HasFactory;

    protected $table = 'stok_barang';

    // Jika kolom primary key bukan id, tentukan dengan ini
    // protected $primaryKey = 'kode_barang'; 

    // Menentukan kolom yang bisa diisi massal
    protected $fillable = [
        'title',
        'kode_barang',
        'stock',
    ];

    // Menonaktifkan timestamps jika tabel tidak menggunakan created_at dan updated_at
    // public $timestamps = false;

    /**
     * Relasi ke tabel BarangMasuk.
     * Sebuah StokBarang bisa memiliki banyak BarangMasuk.
     */
    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    /**
     * Relasi ke tabel BarangKeluar.
     * Sebuah StokBarang bisa memiliki banyak BarangKeluar.
     */
    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}
