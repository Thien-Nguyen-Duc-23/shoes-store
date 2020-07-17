<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShoesColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoes_colors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shoes_id');
            $table->unsignedBigInteger('color_id');
            $table->foreign('shoes_id')
                ->references('id')->on('shoes')
                ->onDelete('cascade');
            $table->foreign('color_id')
                ->references('id')->on('colors')
                ->onDelete('cascade');
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
        Schema::dropIfExists('shoes_colors');
    }
}
