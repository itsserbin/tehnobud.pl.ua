<?php

namespace App\Services\Dto\Plan;

use Illuminate\Http\UploadedFile;

class UpdatePlanImageDto {
    
    public function __construct(
        private UploadedFile $plan,
    ) {
    }
    
    /**
     * @return \Illuminate\Http\UploadedFile
     */
    public function getPlan(): UploadedFile
    {
        
        return $this->plan;
    }
}