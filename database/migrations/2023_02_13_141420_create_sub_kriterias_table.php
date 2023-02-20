<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voidphp artisan serve
     */
    public function up()
    {
        Schema::create('sub_kriterias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kriteria_id')->references('id')->on('kriterias')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->double('bobot');
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
        Schema::dropIfExists('sub_kriterias');
    }
}
