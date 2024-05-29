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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->constrained()->onDelete('cascade');
            $table->string('code')->unique();
            $table->string('name');
        });        
    // Insert default data
    DB::table('courses')->insert([
        ['name' => 'SOFTWARE IMPROVEMENET', 'faculty_id' => '2', 'code' => 'ISP573'],
        ['name' => 'SOFTWARE TESTING', 'faculty_id' => '2', 'code' => 'ISP601'],
    ]);
}

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
