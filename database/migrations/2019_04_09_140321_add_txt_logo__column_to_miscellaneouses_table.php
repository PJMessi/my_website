<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTxtLogoColumnToMiscellaneousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('miscellaneouses', function (Blueprint $table) {
            $table->string("txt_logo")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('miscellaneouses', function (Blueprint $table) {
            $table->drop("txt_logo");
        });
    }
}
