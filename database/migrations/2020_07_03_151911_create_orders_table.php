<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('user_add_id')->nullable();
            $table->unsignedBigInteger('user_accepted_id')->nullable();
            $table->double('amount')->nullable();

            $table->foreign('user_add_id')->references('id')->on('users')
            ->onUpdate('no action')->onDelete('no action');

            $table->foreign('user_accepted_id')->references('id')->on('users')
            ->onUpdate('no action')->onDelete('no action');

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
