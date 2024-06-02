<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PhotoSeeder extends Seeder
{
    public function run()
    {
        $sourceDirectory = public_path('images/galleryphotos');
        $destinationDirectory = storage_path('app/public/media');

        if (!File::exists($destinationDirectory)) {
            File::makeDirectory($destinationDirectory, 0755, true);
        }

        $images = [
            'photo1.jpg',
            'photo2.jpg',
            'photo3.jpg',
            'photo4.jpg',
            'photo5.jpg',
        ];

        foreach ($images as $image) {
            $sourcePath = $sourceDirectory . '/' . $image;
            $destinationPath = $destinationDirectory . '/' . $image;

            if (File::exists($sourcePath)) {
                File::copy($sourcePath, $destinationPath);
            }
        }

        $media = [
            [
                'disk' => 'public',
                'directory' => 'media',
                'visibility' => 'public',
                'name' => 'PLM Main Entrance',
                'path' => 'media/photo1.jpg', // Local path
                'width' => null,
                'height' => null,
                'size' => null,
                'type' => 'image',
                'ext' => 'jpg',
                'alt' => 'PLM Main Entrance',
                'title' => 'PLM Main Entrance',
                'description' => null,
                'caption' => null,
                'exif' => null,
                'curations' => null,
                'created_at' => Carbon::create(2021, 8, 15),
                'updated_at' => Carbon::create(2021, 8, 16)
            ],
            [
                'disk' => 'public',
                'directory' => 'media',
                'visibility' => 'public',
                'name' => 'PLM Campus Building',
                'path' => 'media/photo2.jpg', // Local path
                'width' => null,
                'height' => null,
                'size' => null,
                'type' => 'image',
                'ext' => 'jpg',
                'alt' => 'PLM Campus Building',
                'title' => 'PLM Campus Building',
                'description' => null,
                'caption' => null,
                'exif' => null,
                'curations' => null,
                'created_at' => Carbon::create(2022, 6, 10),
                'updated_at' => Carbon::create(2022, 6, 12)
            ],
            [
                'disk' => 'public',
                'directory' => 'media',
                'visibility' => 'public',
                'name' => 'PLM University Grounds',
                'path' => 'media/photo3.jpg', // Local path
                'width' => null,
                'height' => null,
                'size' => null,
                'type' => 'image',
                'ext' => 'jpg',
                'alt' => 'PLM University Grounds',
                'title' => 'PLM University Grounds',
                'description' => null,
                'caption' => null,
                'exif' => null,
                'curations' => null,
                'created_at' => Carbon::create(2023, 9, 5),
                'updated_at' => Carbon::create(2023, 9, 7)
            ],
            [
                'disk' => 'public',
                'directory' => 'media',
                'visibility' => 'public',
                'name' => 'PLM Students',
                'path' => 'media/photo4.jpg', // Local path
                'width' => null,
                'height' => null,
                'size' => null,
                'type' => 'image',
                'ext' => 'jpg',
                'alt' => 'PLM Students',
                'title' => 'PLM Students',
                'description' => null,
                'caption' => null,
                'exif' => null,
                'curations' => null,
                'created_at' => Carbon::create(2024, 4, 20),
                'updated_at' => Carbon::create(2024, 4, 22)
            ],
        ];

        DB::table('media')->insert($media);
    }
}
