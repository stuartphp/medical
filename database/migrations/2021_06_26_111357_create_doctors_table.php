<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('practice_number');
            $table->string('practice_name');
            $table->string('physical_address1');
            $table->string('physical_address2')->nullable();
            $table->string('physical_suburb')->nullable();
            $table->string('physical_town');
            $table->string('physical_postal_code');
            $table->string('physical_province');
            $table->string('postal_address1');
            $table->string('postal_address2')->nullable();
            $table->string('postal_suburb')->nullable();
            $table->string('postal_town');
            $table->string('postal_postal_code');
            $table->string('fax')->nullable();
            $table->string('contact_number');
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
        Schema::dropIfExists('doctors');
    }
}
