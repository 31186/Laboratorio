<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('page_id');
            $table->unsignedBigInteger('type_id');

            $table->foreign('page_id')->references('id')->on('pages');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages_types');
    }
}
