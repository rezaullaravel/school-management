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
        Schema::create('fees_collections', function (Blueprint $table) {
            $table->id();
            $table->integer('clas_id');
            $table->integer('session_id');
            $table->integer('student_id');
            $table->string('total_fee');
            $table->string('given_amount');
            $table->string('due_amount');
            $table->string('month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees_collections');
    }
};
