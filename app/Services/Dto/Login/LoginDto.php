<?php


namespace App\Services\Dto\Login;

use JetBrains\PhpStorm\Immutable;

/**
 * Class LoginDto
 *
 * @package App\Services\Dto\Login
 */
#[Immutable]
final class LoginDto
{

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $password;

    /**
     * LoginDto constructor.
     *
     * @param  string  $name
     * @param  string  $password
     */
    public function __construct(string $name, string $password)
    {
        $this->name     = $name;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

}