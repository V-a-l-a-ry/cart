<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * 
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * 
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
