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
        Schema::dropIfExists('learns');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('learns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teach_id')->constrained('teaches')->onDelete('cascade');
            $table->string('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }
};
