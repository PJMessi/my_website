<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiscellaneousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miscellaneouses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("status");
            $table->string("title")->nullable();
            $table->string("logo")->nullable();
            $table->text("trButton")->nullable();
            $table->string("footer")->nullable();
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
        Schema::dropIfExists('miscellaneouses');
    }
}
