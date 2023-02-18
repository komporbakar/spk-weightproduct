<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatif_kriteria', function (Blueprint $table) {
            // $table->id();
            // $table->integer('id_alternatif');
            // $table->integer('id_kriteria');
            // $table->foreignId('id_alternatif')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('alternatif_id')->references('id')->on('alternatifs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kriteria_id')->references('id')->on('kriterias')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('id_kriteria')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->double('nilai');
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
        Schema::dropIfExists('alternatif_kriteria');
    }
}
