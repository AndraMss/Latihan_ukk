<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'barang_id',
        'harga',
        'diskon',
        'total_harga',
    ];

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }
}
