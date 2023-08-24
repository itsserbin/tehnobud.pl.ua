<?php


namespace App\Exceptions;


use JetBrains\PhpStorm\Pure;
use RuntimeException;

final class LoginFailException extends RuntimeException
{

    private string $userMessages;

    /**
     * LoginFailException constructor.
     *
     * @param  string  $userMessages
     */
    #[Pure]
    public function __construct(
        string $userMessages
    ) {
        parent::__construct('Login or password invalid');
        $this->userMessages = $userMessages;
    }

    /**
     * @return string
     */
    public function getUserMessages(): string
    {
        return $this->userMessages;
    }

}