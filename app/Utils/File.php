<?php

namespace App\Utils;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class File
{
    public static function upload(UploadedFile $file, string $directory = 'uploads', string $disk = 'public'): false|string
    {
        return $file->store($directory, $disk);
    }

    public static function deleteFile(string $path, string $disk = 'public'): bool
    {
        if (Storage::disk($disk)->exists($path)) {
            return Storage::disk($disk)->delete($path);
        }

        return false;
    }

    public static function getImage(string $url): string
    {
        return asset('storage/'.$url);
    }
}
