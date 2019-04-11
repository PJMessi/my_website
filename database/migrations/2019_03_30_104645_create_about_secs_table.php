<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutSecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_secs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('watermark')->nullable();
            $table->string('heading_1')->nullable();
            $table->string('heading_2')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('image_label')->nullable();
            $table->string('image')->nullable();
            $table->text('button')->nullable();
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
        Schema::dropIfExists('about_secs');
    }
}
