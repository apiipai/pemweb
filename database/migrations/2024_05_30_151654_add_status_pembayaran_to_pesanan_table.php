<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pesanan', function (Blueprint $table) {
            $table->string('status_pembayaran')->default('pending'); // Tambahkan kolom status_pembayaran dengan nilai default 'pending'
        });
    }
};
