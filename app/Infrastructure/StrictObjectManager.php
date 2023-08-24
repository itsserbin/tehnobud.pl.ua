<?php

namespace App\Infrastructure;

use App\Exceptions\ServiceException;
use Doctrine\Persistence\ObjectManager;

/**
 * Interface StrictObjectManager
 *
 * @package App\Infrastructure
 */
interface StrictObjectManager extends ObjectManager
{

    /**
     * @param   string  $entityName  The class name of the object
     *                                           to find.
     * @param   mixed  $id  The identity of the object to
     *                                           find.
     *
     * @return object The found object.
     *
     * @template T
     * @psalm-param class-string<T> $entityName
     * @psalm-return T
     * @throws ServiceException
     */
    public function findOrFail(string $entityName, mixed $id): object;

}
