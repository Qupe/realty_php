<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealtyPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('realty_properties')) {
            return;
        }

        Schema::create('realty_properties', function (Blueprint $table) {
            $table->unsignedInteger('realty_id');
            $table->foreign('realty_id')->references('id')->on('realty');
            $table->string('property_code', 255);
            $table->foreign('property_code')->references('code')->on('properties');
            $table->string('value', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realty_properties');
    }
}
