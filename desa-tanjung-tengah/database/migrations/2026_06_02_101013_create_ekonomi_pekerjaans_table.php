<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkonomiPekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('ekonomi_pekerjaans', function (Blueprint $table) {

            $table->id();

            $table->year('tahun');

            $table->string('kategori_sektor');

            $table->string('jenis_pekerjaan');

            $table->integer('laki_laki')->nullable();

            $table->integer('perempuan')->nullable();

            $table->integer('total')->nullable();

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
        Schema::dropIfExists('ekonomi_pekerjaans');
    }
}
