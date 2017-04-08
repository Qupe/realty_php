<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('agencies')) {
            return;
        }

        Schema::create('agencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('site')->nullable();
            $table->integer('logotype')->nullable();
            $table->text('description')->nullable();
            $table->integer('created_by');
            $table->tinyInteger('active')->default(1);
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('coordinates')->nullable();
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
        Schema::dropIfExists('agencies');
    }
}
