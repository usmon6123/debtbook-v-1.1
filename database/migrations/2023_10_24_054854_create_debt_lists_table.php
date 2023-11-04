<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('debt_lists', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('debtor_id');
            $table->foreign('debtor_id')->references('id')->on('users')->onDelete('cascade');

            $table->double('debt_sum')->default(0);

            $table->boolean('in_or_out')->default(true);

            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debt_lists');
    }
};
