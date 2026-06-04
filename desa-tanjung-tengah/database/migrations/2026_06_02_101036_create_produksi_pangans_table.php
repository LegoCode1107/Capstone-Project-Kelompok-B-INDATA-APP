<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksiPangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produksi_pangans', function (Blueprint $table) {

            $table->id();

            $table->year('tahun');

            $table->string('sektor');

            $table->string('komoditas');

            $table->string('luas_ha')->nullable();

            $table->string('hasil_produksi')->nullable();

            $table->bigInteger('nilai_produksi')->nullable();

            $table->bigInteger('biaya_pupuk')->nullable();

            $table->bigInteger('biaya_bibit')->nullable();

            $table->bigInteger('biaya_obat')->nullable();

            $table->bigInteger('biaya_lainnya')->nullable();

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
        Schema::dropIfExists('produksi_pangans');
    }
}
