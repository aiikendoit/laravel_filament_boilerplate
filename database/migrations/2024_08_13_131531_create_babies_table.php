<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('babies', function (Blueprint $table) {
            $table->id();
            $table->string('regCode');
            $table->string('hospNo');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('suffix')->nullable();
            $table->date('birthdate');
            $table->string('address');
            $table->string('claimantContactName')->nullable();
            $table->string('claimantContactNo')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('babies');
    }
};
