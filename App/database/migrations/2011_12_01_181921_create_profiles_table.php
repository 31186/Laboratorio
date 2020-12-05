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
            $table->string('picture');
            $table->string('cover_image');
            $table->string('job_title');
            $table->string('sn_twitter');
            $table->string('sn_facebook');
            $table->string('sn_instagram');
            $table->string('sn_skype');
            $table->string('sn_linkedin');
            $table->string('description');
            $table->string('job_description');
            $table->string('website');
            $table->integer('phone');
            $table->string('city');
            $table->string('country');
            $table->string('degree');
            $table->string('skills_description');
            $table->string('cv');
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
