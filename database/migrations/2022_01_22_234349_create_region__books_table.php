<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region__books', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_book')->nullable();
            $table->foreign('id_book')->references('id')->on('books')->onDelete('cascade');

            $table->unsignedBigInteger('id_region')->nullable();
            $table->foreign('id_region')->references('id')->on('regions')->onDelete('cascade');

            $table->unsignedBigInteger('id_clasification')->nullable();
            $table->foreign('id_clasification')->references('id')->on('clasifications')->onDelete('cascade');

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
        Schema::dropIfExists('region__books');
    }
}
