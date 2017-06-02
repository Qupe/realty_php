<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('property_types')) {
            return;
        }

        Schema::create('property_types', function (Blueprint $table) {
            $table->unsignedInteger('realty_type_id');
            $table->unsignedInteger('transaction_type_id');
            $table->string('property_code', 255);
            $table->foreign('property_code')->references('code')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_types');
    }
}
