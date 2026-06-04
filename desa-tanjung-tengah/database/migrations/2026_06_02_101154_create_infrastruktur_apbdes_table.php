<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfrastrukturApbdesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infrastruktur_apbdes', function (Blueprint $table) {

            $table->id();

            $table->year('tahun');

            $table->string('sektor_fasilitas');

            $table->string('indikator_infrastruktur');

            $table->string('satuan')->nullable();

            $table->string('nilai_kuantitatif')->nullable();

            $table->string('nilai_kualitatif')->nullable();

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
        Schema::dropIfExists('infrastruktur_apbdes');
    }
}
