<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('sn_twitter');
            $table->string('sn_facebook');
            $table->string('sn_instagram');
            $table->string('sn_linkedin');
            $table->string('description');
            $table->string('website');
            $table->integer('phone');
            $table->string('city');
            $table->string('country');
            $table->string('cover_image');
            $table->string('logo');
            $table->string('business_type');
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
        Schema::dropIfExists('pages');
    }
}
