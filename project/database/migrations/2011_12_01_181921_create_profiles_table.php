<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('picture')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('job_title')->nullable();
            $table->string('sn_twitter')->nullable();
            $table->string('sn_facebook')->nullable();
            $table->string('sn_instagram')->nullable();
            $table->string('sn_linkedin')->nullable();
            $table->string('description')->nullable();
            $table->string('job_description')->nullable();
            $table->string('website')->nullable();
            $table->integer('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('degree')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
