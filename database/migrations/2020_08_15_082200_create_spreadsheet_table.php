<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpreadsheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spreadsheets', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->text('seriya');
            $table->text('nomer');
            $table->text('fio');
            $table->text('special');
            $table->text('status');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public
    function down()
    {
        Schema::dropIfExists('spreadsheet');
    }
}
