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
        Schema::create('costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('code');
            $table->string('name');
            $table->date('transaction_date');
            $table->text('description');
            $table->text('notes')->nullable();
            $table->string('payment_method')->nullable();
            $table->decimal('total', 65, 30)->default(0);
            $table->enum('status', ['pending', 'proses', 'invalid', 'valid']);
            $table->string('no_reference')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->default(0);
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('costs');
        Schema::enableForeignKeyConstraints();
    }
};
