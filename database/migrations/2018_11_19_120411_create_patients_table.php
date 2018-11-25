<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doc_id')->nullable();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('spouse_g')->nullable();
            $table->string('birthdate');
            $table->string('gender');
            $table->string('contact_number')->nullable();
            $table->string('address')->nullable();
            $table->string('image_ext')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE patients ADD image LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
