<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealtyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('agencies')) {
            return;
        }

        Schema::create('realty', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('transaction_type');
            $table->integer('realty_type');
            $table->integer('price');
            $table->text('description')->nullable();;
            $table->integer('image')->nullable();;
            $table->integer('created_by');
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
        Schema::dropIfExists('realty');
    }
}
