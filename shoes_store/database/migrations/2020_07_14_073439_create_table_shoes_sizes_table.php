<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShoesSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoes_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shoes_id');
            $table->unsignedBigInteger('size_id');
            $table->foreign('shoes_id')
                ->references('id')->on('shoes')
                ->onDelete('cascade');
            $table->foreign('size_id')
                ->references('id')->on('sizes')
                ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('shoes_sizes');
    }
}
