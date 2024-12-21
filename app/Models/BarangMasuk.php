<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StokBarang;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';

    protected $fillable = [
        'title',
        'kode_barang',
        'quantity',
        'destination',
        'tanggal_masuk',
    ];

    /**
     * Relasi ke tabel StokBarang.
     */
    public function stokBarang()
    {
        return $this->belongsTo(StokBarang::class);
    }
}
