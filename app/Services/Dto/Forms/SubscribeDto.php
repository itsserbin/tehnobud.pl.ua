<?php

namespace App\Services\Dto\Forms;

use JetBrains\PhpStorm\ArrayShape;

/**
 * Class SubscribeDto
 *
 * @package App\Services\Dto\Forms
 */
class SubscribeDto
{
    
    /**
     * SubscribeDto constructor.
     *
     * @param   string  $email
     * @param   string  $url
     * @param   string|null  $nameForm
     */
    public function __construct(
        private string $email,
        private string $url,
        private ?string $nameForm,
    ) {
    }
    
    /**
     * @return string|null
     */
    public function getNameForm(): ?string
    {
        return $this->nameForm;
    }
    
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
    
    
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    
    /**
     * @return string[]
     */
    #[ArrayShape(['email' => "string"])]
    public function getParams(): array
    {
        return [
            'email' => $this->email,
        ];
    }
    
}
