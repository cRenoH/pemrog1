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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            // PERBAIKAN: Gunakan foreignId() untuk membuat kolom dan foreign key.
            // Kode ini akan membuat kolom 'user_id' bertipe unsignedBigInteger
            // dan menambahkannya sebagai foreign key yang merujuk ke tabel 'users'.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->foreignId('product_variant_id')->constrained('product_variants')->onDelete('cascade');
            $table->unsignedInteger('quantity'); // Diubah menjadi unsignedInteger untuk konsistensi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};