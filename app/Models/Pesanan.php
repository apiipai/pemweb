<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = ['full_name', 'address', 'status_pembayaran'];

    public function details()
    {
        return $this->hasMany(DetailPesanan::class);
    }
}
