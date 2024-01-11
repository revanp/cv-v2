<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portofolio', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('name');
            $table->string('url')->nullable();
            $table->text('description');
            $table->boolean('is_active')->default(true);
            $table->integer('sort');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portofolio');
    }
};
