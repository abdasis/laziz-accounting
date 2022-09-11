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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('nick_name');
            $table->enum('type_contact', ['customer', 'supplier', 'karyawan', 'lainnya']);
            $table->string('contact_name')->nullable();
            $table->string('handphone')->nullable();
            $table->string('type_identity')->nullable();
            $table->string('identity_number')->nullable();
            $table->string('company_name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('npwp')->nullable();
            $table->text('purchase_address')->nullable();
            $table->text('shipping_address')->nullable();

            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('branch_office')->nullable();
            $table->string('bank_account_name')->nullable();

            $table->unsignedBigInteger('akun_hutang')->nullable();
            $table->unsignedBigInteger('akun_piutang')->nullable();
            $table->enum('status', ['active','nonactive','pending'])->default('active');
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
        Schema::dropIfExists('contacts');
    }
};
