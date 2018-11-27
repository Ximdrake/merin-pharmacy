<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pid')->nullable();
            $table->foreign('pid')->references('id')->on('patients')->onDelete('cascade');
            $table->string('generic_name');
            $table->string('brand_name');
            $table->string('dosage_form');
            $table->string('dosage_strength');
            $table->integer('pres_quantity');
            $table->integer('quantity_took')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('signa');
            $table->string('allergy')->nullable();
            $table->string('time')->nullable();
            $table->string('per_day')->nullable();
            $table->string('refill_check')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('prescriptions');
    }
}
