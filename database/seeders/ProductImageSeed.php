<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\ProductImages; // <-- 1. Import Model yang benar


class ProductImageSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menonaktifkan pengecekan foreign key untuk truncate
        // Schema::disableForeignKeyConstraints();
        DB::table('product_images')->truncate();
        // Schema::enableForeignKeyConstraints();

        $basePath = 'img/product/FIX/';
        $views = ['FRONT', 'BACK'];

        $productsData = [
            1 => [
                'category_folder' => 'boxy fit tee',
                'design_folder' => 'WORKAHOLIC',
                'filename_base' => 'WORKAHOLIC',
                'colors' => ['BLACK', 'BLUE', 'WHITE'],
            ],
            2 => [
                'category_folder' => 'boxy fit tee',
                'design_folder' => 'WHERE WE DO WE CAME FROM',
                'filename_base' => 'WHEREWEDOWECAMEFROM',
                'colors' => ['BLACK', 'WHITE'],
            ],
            3 => [
                'category_folder' => 'boxy fit tee',
                'design_folder' => 'STD',
                'filename_base' => 'DARIMATA',
                'colors' => ['BLACK', 'BLACK&RED', 'WHITE'],
            ],
            4 => [
                'category_folder' => 'boxy fit tee',
                'design_folder' => 'MINIMALISM',
                'filename_base' => 'MINIMALISM',
                'colors' => ['BLACK', 'WHITE'],
            ],
            5 => [
                'category_folder' => 'boxy fit tee',
                'design_folder' => 'CREATIVITY',
                'filename_base' => 'CREATIVITY',
                'colors' => ['BLACK', 'WHITE', 'BLUE', 'BROWN', 'GREY'],
            ],
            6 => [
                'category_folder' => 'boxy fit tee',
                'design_folder' => 'CREATIVITY V2',
                'filename_base' => 'CREATIVITY V2',
                'colors' => ['BLACK', 'WHITE'],
            ],
            7 => [
                'category_folder' => 'hoodie',
                'design_folder' => 'WORKAHOLIC',
                'filename_base' => 'WORKAHOLIC',
                'colors' => ['BLACK', 'BROWN', 'WHITE'],
            ],
            8 => [
                'category_folder' => 'hoodie',
                'design_folder' => 'MATA',
                'filename_base' => 'MATA',
                'colors' => ['WHITE' , 'BLACK'],
            ],
            9 => [
                'category_folder' => 'hoodie',
                'design_folder' => 'KREATIF',
                'filename_base' => 'KREATIF',
                'colors' => ['ALLBLACK' , 'BLUE', 'WHITE'],
            ],
            10 => [
                'category_folder' => 'hoodie',
                'design_folder' => 'DRMTSTD',
                'filename_base' => 'DRMTSTD',
                'colors' => ['BLACK ORANGE', 'BLACK RED'],
            ],
            11 => [
                'category_folder' => 'hoodie',
                'design_folder' => 'DARIMATA',
                'filename_base' => 'DARIMATA',
                'colors' => ['BLACK' , 'BLUE', 'BROWN','WHITE'],
            ],
            12 => [
                'category_folder' => 'crewneck',
                'design_folder' => 'HUMANS',
                'filename_base' => 'HUMANS',
                'colors' => ['BLACK', 'BROWN', 'DARK GREEN','LIGHT GREY'],
            ],
            13 => [
                'category_folder' => 'crewneck',
                'design_folder' => 'HAPPINESS',
                'filename_base' => 'HAPPINESS',
                'colors' => ['BEIGE', 'BLACK', 'BLUE','BROWN'],
            ],
            14 => [
                'category_folder' => 'crewneck',
                'design_folder' => 'DRMTSTD',
                'filename_base' => 'DRMTSTD',
                'colors' => ['ALLBLACK', 'BLACKRED', 'GREY'],
            ],
            15 => [
                'category_folder' => 'crewneck',
                'design_folder' => 'CREATIVE SOLUTIONS',
                'filename_base' => 'CREATIVESOLUTIONS',
                'colors' => ['BEIGE' , 'BLACK' , 'GREEN', 'WHITE'],
            ],
        ];

        foreach ($productsData as $productId => $data) {
            $isFirstFrontImage = true;

            foreach ($data['colors'] as $color) {
                foreach ($views as $view) {
                    $fileName = "{$data['filename_base']} - {$color} - {$view}.png";
                    $imagePath = "{$basePath}{$data['category_folder']}/{$data['design_folder']}/{$fileName}";
                    $isPrimary = ($view === 'FRONT' && $isFirstFrontImage);

                    // 2. Memanggil create() pada MODEL yang benar
                    \App\Models\ProductImages::create([
                        'product_id' => $productId,
                        'image_path' => $imagePath,
                        'is_primary' => $isPrimary,
                    ]);

                    if ($isPrimary) {
                        $isFirstFrontImage = false;
                    }
                }
            }
        }
    }
}
