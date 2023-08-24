<?php


namespace App\Exceptions;


use JetBrains\PhpStorm\Pure;
use RuntimeException;

class ServiceException extends RuntimeException
{

    /**
     * @var string
     */
    private string $userMessage;

    /**
     * ServiceException constructor.
     *
     * @param  string  $userMessage
     */
    #[Pure]
    public function __construct(
        string $userMessage,
    ) {
        $this->userMessage = $userMessage;
        parent::__construct('Service exception');
    }

    /**
     * @return string
     */
    public function getUserMessage(): string
    {
        return $this->userMessage;
    }
}