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
        Schema::create('sales_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('sale_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedInteger('contact_id')->nullable();
            $table->text('description');
            $table->integer('quantity');
            $table->string('unit')->nullable();
            $table->string('tax');
            $table->integer('day')->nullable();
            $table->string('discount')->nullable();
            $table->decimal('price', 18, 2);
            $table->decimal('total', 18, 2);
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
        Schema::dropIfExists('sales_details');
    }
};
