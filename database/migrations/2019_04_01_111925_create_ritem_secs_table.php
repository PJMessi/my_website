<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRitemSecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ritem_secs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string("icon")->nullable();
            $table->string("heading")->nullable();
            $table->string("interval")->nullable();
            $table->mediumText("description")->nullable();
            $table->string("image")->nullable();
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
        Schema::dropIfExists('ritem_secs');
    }
}
