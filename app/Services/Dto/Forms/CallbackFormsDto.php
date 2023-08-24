<?php

namespace App\Services\Dto\Forms;

use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

/**
 * Class CallbackFormsDto
 *
 * @package App\Services\Dto\Forms
 */
final class CallbackFormsDto
{
    
    /**
     * CallbackFormsDto constructor.
     *
     * @param   string  $name
     * @param   string|null  $email
     * @param   string  $phone
     * @param   string  $url
     */
    public function __construct(
        private string $name,
        private ?string $email,
        private string $phone,
        private string $url,
        private ?string $name_form,
    ) {
    }
    
    /**
     * @return string|null
     */
    public function getNameForm(): ?string
    {
        return $this->name_form;
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
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    
    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
    
    
    /**
     * @return array<array-key, string>
     */
    #[Pure]
    #[ArrayShape([
        'name'  => "string",
        'email' => "string",
        'phone' => "string",
    ])]
    public function getAll(): array
    {
        return [
            'name'  => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
    
}