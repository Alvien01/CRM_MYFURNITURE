<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string(('id_barang'));
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->integer('harga_barang');
            $table->integer('stock');
            $table->string('id_distributor');
            
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_barangs');
    }
};
