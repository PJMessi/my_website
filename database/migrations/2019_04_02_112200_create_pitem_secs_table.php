<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePitemSecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pitem_secs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('watermark');
            $table->string('title')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('detail')->nullable();
            $table->text('category')->nullable();
            $table->text('date')->nullable();
            $table->string('client')->nullable();
            $table->string('skill')->nullable();
            $table->string('location')->nullable();
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
        Schema::dropIfExists('pitem_secs');
    }
}
