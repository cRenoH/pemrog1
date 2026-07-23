<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ProductImages;
use App\Helpers\ImageOptimizer;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class ConvertImagesToWebp extends Command
{
    protected $signature   = 'images:convert-webp {--dry-run : Tampilkan gambar yang akan dikonversi tanpa melakukan perubahan}';
    protected $description = 'Konversi semua gambar produk lama (jpg/jpeg/png) ke format WebP terkompresi';

    public function handle(): void
    {
        $dryRun  = $this->option('dry-run');
        $images  = ProductImages::all();
        $manager = new ImageManager(new Driver());
        $converted = 0;
        $skipped   = 0;

        $this->info('Memeriksa ' . $images->count() . ' gambar produk...');
        $bar = $this->output->createProgressBar($images->count());
        $bar->start();

        foreach ($images as $img) {
            $oldPath = $img->image_path;

            // Lewati gambar yang sudah WebP
            if (str_ends_with(strtolower($oldPath), '.webp')) {
                $skipped++;
                $bar->advance();
                continue;
            }

            // Cek file ada di storage
            if (!Storage::disk('public')->exists($oldPath)) {
                $this->newLine();
                $this->warn("  File tidak ada: {$oldPath}");
                $bar->advance();
                continue;
            }

            if ($dryRun) {
                $this->newLine();
                $this->line("  [DRY RUN] Akan dikonversi: {$oldPath}");
                $bar->advance();
                $converted++;
                continue;
            }

            try {
                $fullPath = Storage::disk('public')->path($oldPath);
                $image    = $manager->read($fullPath);

                // Resize jika terlalu besar
                if ($image->width() > ImageOptimizer::MAX_WIDTH || $image->height() > ImageOptimizer::MAX_HEIGHT) {
                    $image->scaleDown(ImageOptimizer::MAX_WIDTH, ImageOptimizer::MAX_HEIGHT);
                }

                // Tentukan path baru (.webp)
                $newPath = preg_replace('/\.(jpg|jpeg|png|gif)$/i', '.webp', $oldPath);
                if ($newPath === $oldPath) {
                    $newPath = $oldPath . '.webp';
                }

                // Simpan WebP
                $encoded = $image->toWebp(ImageOptimizer::WEBP_QUALITY);
                Storage::disk('public')->put($newPath, (string) $encoded);

                // Hapus file lama
                Storage::disk('public')->delete($oldPath);

                // Update database
                $img->image_path = $newPath;
                $img->save();

                $converted++;
            } catch (\Throwable $e) {
                $this->newLine();
                $this->error("  Gagal konversi {$oldPath}: " . $e->getMessage());
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);

        if ($dryRun) {
            $this->info("DRY RUN selesai: {$converted} gambar akan dikonversi, {$skipped} sudah WebP.");
        } else {
            $this->info("✅ Selesai! {$converted} gambar dikonversi ke WebP, {$skipped} gambar sudah WebP.");
        }
    }
}
