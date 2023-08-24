<?php

namespace App\Infrastructure\Photo\Storage\Contracts;

use Illuminate\Http\UploadedFile;

/**
 * Interface Storage
 *
 * @package App\Infrastructure\Photo\Storage\Contracts
 */
interface Storage
{
    
    /**
     * @param   string  $path
     * @param   \Illuminate\Http\UploadedFile  $file
     *
     * @return string
     */
    public function upload(
        string $path,
        UploadedFile $file
    ): string;
    
    /**
     * @param   string  $path
     *
     * @return bool
     */
    public function drop(string $path): bool;
    
    
    /**
     * @param   string  $path
     *
     * @return bool
     */
    public function dropDirectory(string $path): bool;
    
}