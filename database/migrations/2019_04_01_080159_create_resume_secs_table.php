<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeSecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_secs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("status");
            $table->string("watermark")->nullable();
            $table->string("heading_1")->nullable();
            $table->string("heading_2")->nullable();
            $table->mediumText("description")->nullable();
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
        Schema::dropIfExists('resume_secs');
    }
}
