<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            // $table->integer('id_alternatif');
            // $table->integer('id_kriteria');
            $table->foreignId('id_alternatif')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_kriteria')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('nilais');
    }
}
