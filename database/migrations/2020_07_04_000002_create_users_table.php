<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone');
            $table->string('password', 64);
            $table->string('fcm_token', 255)->nullable();
            $table->unsignedBigInteger('dealer_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->unique(["phone"], 'username_UNIQUE');
            $table->timestamps();

            $table->foreign('dealer_id')->references('id')->on('dealers')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
