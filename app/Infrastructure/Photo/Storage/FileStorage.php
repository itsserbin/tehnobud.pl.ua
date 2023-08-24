<?php

namespace App\Infrastructure\Photo\Storage;

use App\Infrastructure\Photo\Storage\Contracts\Storage;
use Illuminate\Http\UploadedFile;

/**
 * Class FileStorage
 *
 * @package App\Infrastructure\Photo\Storage
 */
final class FileStorage implements Storage
{
    
    /**
     * @param   string  $path
     * @param   mixed  $file
     *
     * @return string
     */
    public function upload(
        string $path,
        UploadedFile $file
    ): string {
        return \Storage::disk('public')
            ->putFile(
                $path,
                $file,
                'public'
            );
    }
    
    /**
     * @param   string  $path
     *
     * @return bool
     */
    public function drop(string $path): bool
    {
        return \Storage::disk('public')
            ->delete($path);
    }
    
    public function dropDirectory(string $path): bool
    {
        return \Storage::disk('public')
            ->deleteDirectory($path);
    }
    
}