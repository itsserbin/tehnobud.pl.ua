<?php

namespace App\Services\Dto\Room;

use Illuminate\Http\UploadedFile;

class UpdateImageRoomDto {
    
    public function __construct(
        private UploadedFile $photo,
    ) {
    
    }
    
    /**
     * @return \Illuminate\Http\UploadedFile
     */
    public function getPhoto(): UploadedFile
    {
        
        return $this->photo;
    }
    
}