<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tambah constraint: stok tidak boleh negatif
        DB::statement('ALTER TABLE product_variants ADD CONSTRAINT chk_stock_non_negative CHECK (stock >= 0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE product_variants DROP CONSTRAINT chk_stock_non_negative');
    }
};
