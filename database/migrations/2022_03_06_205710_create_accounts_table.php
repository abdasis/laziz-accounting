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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_category_id')->constrained('account_categories');
            $table->bigInteger('code');
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->enum('report_type', ['neraca', 'laba rugi']);
            $table->enum('account_type', ['kas', 'umum'])->default('umum');
            $table->enum('default_balance', ['debit', 'kredit']);
            $table->enum('lock_status', ['unlocked', 'locked']);
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('accounts')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
