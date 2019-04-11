<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFaviconColumnToMiscellaneousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('miscellaneouses', function (Blueprint $table) {
            $table->string("favicon")->nullable();
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
            $table->drop("favicon");
        });
    }
}
