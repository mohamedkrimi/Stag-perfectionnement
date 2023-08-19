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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->unsignedBigInteger('produit_id')->nullable();
            $table->foreign('produit_id')
            ->references('id')
            ->on('produits');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
            $table->boolean('is_deleted')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations_name');
    }
};
