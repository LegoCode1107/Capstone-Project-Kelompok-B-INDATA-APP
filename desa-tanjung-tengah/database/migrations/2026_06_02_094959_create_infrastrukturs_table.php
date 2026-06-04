<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfrastruktursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infrastrukturs', function (Blueprint $table) {
            $table->string('tahun');
            $table->string('sektor_fasilitas');
            $table->string('indikator_infrastruktur');
            $table->string('satuan');
            $table->string('nilai_kuantitatif')->nullable();
            $table->string('nilai_kualitatif')->nullable();
            $table->id();
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
        Schema::dropIfExists('infrastrukturs');
    }
}
