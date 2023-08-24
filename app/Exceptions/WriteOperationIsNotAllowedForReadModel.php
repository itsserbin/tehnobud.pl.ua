<?php


namespace App\Exceptions;


use JetBrains\PhpStorm\Pure;
use RuntimeException;

final class WriteOperationIsNotAllowedForReadModel extends RuntimeException
{

    #[Pure]
    public function __construct()
    {
        parent::__construct('Write operation is not allowed for read model');
    }

}