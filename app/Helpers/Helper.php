<?php

namespace App\Helpers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function upload_image($image, $path): string
    {
        $filename = time() . $image->getClientOriginalName();
        Storage::disk('public')->putFileAs(
            $path,
            $image,
            $filename
        );
        return ($path  . $filename);
    }

    public static function delete_image($path): Void
    {
            Storage::disk('public')->delete($path);
    }
}
