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
        Schema::table('users', function (Blueprint $table) {
    $table->string('student_id')->nullable(); // Thêm field mã sinh viên
    $table->string('provider')->nullable();   // Lưu 'google' hoặc 'facebook'
    $table->string('provider_id')->nullable();
    $table->string('avatar')->nullable();
    $table->string('password')->nullable()->change(); // Cho phép null
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
