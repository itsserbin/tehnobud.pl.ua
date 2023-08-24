<?php


namespace App\Exceptions;


use App\Exceptions\Contract\NotFoundException;
use JetBrains\PhpStorm\Pure;
use RuntimeException;

abstract class AbstractNotFoundException extends RuntimeException
    implements NotFoundException
{

    /**
     * @var string
     */
    private string $userMessages;

    /**
     * DistrictNotFoundException constructor.
     *
     * @param  string  $userMessages
     */
    #[Pure]
    public function __construct(
        string $userMessages
    ) {
        $this->userMessages = $userMessages;
        parent::__construct("Not Found");
    }

    /**
     * @return string
     */
    public function getUserMessages(): string
    {
        return $this->userMessages;
    }

}