<?php

namespace App\Infrastructure\Photo;

use App\Infrastructure\Photo\Storage\Contracts\Storage;
use Illuminate\Http\UploadedFile;

/**
 * Class FileUploader
 *
 * @package App\Infrastructure\Photo
 */
final class FileUploader {

    /**
     * ImageUploader constructor.
     *
     * @param \App\Infrastructure\Photo\Storage\Contracts\Storage $storage
     */
    public function __construct(
        private Storage $storage
    ) {
    }

    /**
     * @param string                        $path
     * @param \Illuminate\Http\UploadedFile $file
     *
     * @return string
     */
    public function upload(
        string $path,
        UploadedFile $file
    ): string {

        return $this->storage
            ->upload(
                trim($path, '/'),
                $file
            );
    }

    /**
     * @param string $path
     *
     * @return bool
     */
    public function drop(string $path): bool {

        return $this->storage->drop($path);
    }

    /**
     * @param string $path
     *
     * @return bool
     */
    public function dropDirectory(string $path): bool {

        return $this->storage->dropDirectory($path);
    }

}
