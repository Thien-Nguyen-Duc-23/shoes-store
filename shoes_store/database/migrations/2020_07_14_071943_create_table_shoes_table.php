<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
            $table->string('slug', 255);
            $table->string('name', 255);
            $table->float('price_cost');
            $table->float('price');
            $table->float('price_sale')->nullable();
            $table->string('image');
            $table->string('sort_description', 255);
            $table->text('long_description');
            $table->boolean('status')->default(1)->comment('1: active| 0: not active');
            $table->boolean('is_sale')->default(1)->comment('1: sale| 0: not sale');
            $table->date('start_date_sale')->nullable();
            $table->date('end_date_sale')->nullable();
            $table->string('sku', 255);
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
        Schema::dropIfExists('shoes');
    }
}
