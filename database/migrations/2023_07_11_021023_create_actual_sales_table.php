<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actual_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->unsignedInteger('month');
            $table->unsignedInteger('year');
            $table->decimal('stock', 15, 2)->comment('Kilogram');
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
        Schema::dropIfExists('actual_data');
    }
};
