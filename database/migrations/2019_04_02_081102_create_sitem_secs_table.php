<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitemSecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitem_secs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('heading_1')->nullable();
            $table->mediumText('description_1')->nullable();
            $table->text('items_1')->nullable();
            $table->string('heading_2')->nullable();
            $table->mediumText('description_2')->nullable();
            $table->text('items_2')->nullable();
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
        Schema::dropIfExists('sitem_secs');
    }
}
