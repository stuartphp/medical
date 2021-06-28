<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->string('nappi_code');
            $table->string('regno');
            $table->char('schedule', 2);
            $table->string('name');
            $table->string('unit');
            $table->string('dosage_form')->nullable();
            $table->integer('package_size')->nullable();
            $table->tinyInteger('num_packs')->nullable();
            $table->boolean('is_generic')->default(1);
            $table->unsignedInteger('min_price');
            $table->unsignedInteger('dispencing_fee');
            $table->unsignedInteger('add_fee')->nullable();
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('retail_price');
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
        Schema::dropIfExists('order_items');
    }
}
