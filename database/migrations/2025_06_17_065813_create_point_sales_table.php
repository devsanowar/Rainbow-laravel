<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('point_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // যাকে পয়েন্ট দেয়া হচ্ছে
            $table->decimal('amount', 10, 2); // টাকা (যত টাকায় পয়েন্ট বিক্রি)
            $table->integer('points'); // কত পয়েন্ট
            $table->foreignId('admin_id')->nullable()->constrained('users')->onDelete('set null'); // কে দিয়েছে (optional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('point_sales');
    }
};
