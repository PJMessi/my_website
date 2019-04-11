<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitemSecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titem_secs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("project_id");
            $table->string("status");
            $table->string("name")->nullable();
            $table->integer("stars")->nullable();
            $table->mediumText("content")->nullable();
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
        Schema::dropIfExists('titem_secs');
    }
}
