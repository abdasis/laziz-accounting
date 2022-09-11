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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->constrained();
            $table->string('code');
            $table->dateTime('transaction_date');
            $table->dateTime('due_date');
            $table->bigInteger('no_transaction');
            $table->string('no_refrence')->nullable();
            $table->string('pph_account')->nullable();
            $table->string('income_tax')->nullable();
            $table->string('total_ppn')->nullable();
            $table->enum('status', ['proses','dibayar', 'belum dibayar', 'jatuh tempo', 'dibatalkan'])->default('belum dibayar');
            $table->text('remarks')->nullable();
            $table->text('internal_notes')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('sales');
        Schema::enableForeignKeyConstraints();
    }
};
