<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerikananAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perikanan_asets', function (Blueprint $table) {

            $table->id();

            $table->year('tahun');

            $table->string('kelompok_aset');

            $table->string('nama_aset_infrastruktur');

            $table->string('satuan_ukuran')->nullable();

            $table->decimal('volume_jumlah',15,2)->nullable();

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
        Schema::dropIfExists('perikanan_asets');
    }
}
