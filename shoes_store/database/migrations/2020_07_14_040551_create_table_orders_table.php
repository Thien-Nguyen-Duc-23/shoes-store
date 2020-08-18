<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->float('amount');
            $table->timestamp('date_order');
            $table->integer('order_status')->default(1)->comment('1: New, 2: Processing, 3: Hold, 4: Canceled, 5: Done, 99: Failed');
            $table->integer('shipping_status')->default(1)->comment('1: Not sent, 2: Sending, 3: Shipping done');
            $table->integer('payment_status')->default(1)->comment('1: Unpaid, 2: Paid');
            $table->integer('shipping_method')->default(1)->comment('1: Shipping Standard, 99: Orther');
            $table->integer('payment_method')->default(1)->comment('1: Cash on delivery, 2: Paypal, 99: Orther');
            $table->string('note', 255)->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('orders');
    }
}
