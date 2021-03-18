<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->string('parcel_number', 45)->unique();
            $table->string('address1', 45);
            $table->string('address2', 45)->nullable();
            $table->string('city', 45);
            $table->string('state', 45);
            $table->string('zip', 45);
            $table->integer('area_lot_sf');
            $table->integer('area_building_sf');
            $table->integer('num_beds')->nullable();
            $table->integer('num_bath')->nullable();
            $table->double('tax_value');
            $table->double('market_value');
            $table->integer('year_built');
            $table->timestamp('last_sale_date')->nullable();
            $table->double('last_sale_amount')->nullable();
            $table->unsignedBigInteger('property_type_id');
            $table->foreign('property_type_id')->references('id')->on('property_types');
            $table->boolean('status')->default(false);
            $table->string('resource_link');
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
        Schema::dropIfExists('property');
    }
}
