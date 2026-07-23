<?php

namespace App\Helpers;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ImageOptimizer
{
    /**
     * Max lebar/tinggi gambar produk (px). Gambar lebih besar akan di-resize.
     */
    const MAX_WIDTH  = 1200;
    const MAX_HEIGHT = 1200;

    /**
     * Kualitas WebP (0-100). 82 = titik manis antara kualitas & ukuran file.
     */
    const WEBP_QUALITY = 82;

    /**
     * Proses & simpan gambar yang diupload.
     *
     * 1. Resize jika melebihi MAX_WIDTH / MAX_HEIGHT (pertahankan rasio)
     * 2. Encode ke WebP dengan kualitas WEBP_QUALITY
     * 3. Simpan ke storage/app/public/{$directory}/{unique}.webp
     *
     * @return string  path relatif dari storage root (cocok untuk asset())
     */
    public static function processAndStore(UploadedFile $file, string $directory = 'products'): string
    {
        $manager = new ImageManager(new Driver());

        $image = $manager->read($file->getRealPath());

        // Resize hanya jika gambar lebih besar dari batas maksimum
        if ($image->width() > self::MAX_WIDTH || $image->height() > self::MAX_HEIGHT) {
            $image->scaleDown(self::MAX_WIDTH, self::MAX_HEIGHT);
        }

        // Encode ke WebP
        $encoded = $image->toWebp(self::WEBP_QUALITY);

        // Buat nama file unik
        $filename  = $directory . '/' . uniqid('img_', true) . '.webp';

        // Simpan ke disk 'public'
        Storage::disk('public')->put($filename, (string) $encoded);

        return $filename;
    }

    /**
     * Hapus file gambar dari storage.
     */
    public static function delete(string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
