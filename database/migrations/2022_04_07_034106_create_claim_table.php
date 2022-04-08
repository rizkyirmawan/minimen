<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merk_id');
            $table->unsignedBigInteger('jenis_id');
            $table->unsignedBigInteger('bengkel_id');
            $table->string('nomor_polis');
            $table->string('nama_tertanggung');
            $table->string('kondisi_pertanggungan');
            $table->bigInteger('harga_pertanggungan');
            $table->date('periode_awal');
            $table->date('periode_akhir');
            $table->date('tanggal_kejadian');
            $table->longText('kronologis_kejadian');
            $table->string('nomor_polisi');
            $table->string('nomor_rangka');
            $table->string('nomor_mesin');
            $table->bigInteger('or_count');
            $table->bigInteger('or_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claim');
    }
}
