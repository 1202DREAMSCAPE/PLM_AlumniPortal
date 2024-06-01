<?php

namespace App\Filament\Alumni\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhotoSlideshowWidget extends Widget
{
    protected static string $view = 'filament.alumni.widgets.photo-slideshow-widget';

    public array $photos = [];

    public function mount()
    {
        $this->photos = DB::table('media')
            ->select('title', 'path', 'alt', 'created_at')
            ->orderBy('created_at')
            ->get()
            ->map(function ($media) {
                return [
                    //'title' => $media->title,
                    //'alt' => $media->alt,
                    'created_at' => \Carbon\Carbon::parse($media->created_at)->format('F j, Y'),
                    'media_path' => Storage::disk('public')->url($media->path),
                ];
            })
            ->toArray();
    }

}
