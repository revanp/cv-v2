<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('incoming_money', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->bigInteger('id_bank_account');
            $table->bigInteger('id_incoming_money_category');
            $table->decimal('amount', 20, 2);
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incoming_money');
    }
};
