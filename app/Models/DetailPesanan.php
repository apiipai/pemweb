<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;

    protected $table = 'detail_pesanan';

    protected $fillable = ['pesanan_id', 'item_name', 'quantity', 'price'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
