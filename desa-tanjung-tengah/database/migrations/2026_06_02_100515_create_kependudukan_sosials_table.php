<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKependudukanSosialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kependudukan_sosials', function (Blueprint $table) {

            $table->id();

            $table->year('tahun');

            $table->string('kategori');

            $table->string('indikator');

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
        Schema::dropIfExists('kependudukan_sosials');
    }
}
