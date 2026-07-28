<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Khóa ngoại trỏ đến categories, nullable để dùng nullOnDelete
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            
            $table->string('name', 200);
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->string('document_path')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
