<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('developers')) {
            return;
        }

        Schema::create('developers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('full_name', 255)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->text('description')->nullable();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->unsignedInteger('logo');
            $table->foreign('logo')->references('id')->on('media');
            $table->string('address', 255)->nullable();
            $table->unsignedInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users');
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
        Schema::dropIfExists('developers');
    }
}
