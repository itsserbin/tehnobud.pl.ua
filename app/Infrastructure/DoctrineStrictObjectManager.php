<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Exceptions\ServiceException;
use Doctrine\ORM\Decorator\EntityManagerDecorator;

final class DoctrineStrictObjectManager extends EntityManagerDecorator
    implements StrictObjectManager
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
    public function findOrFail(string $entityName, mixed $id): object
    {
        $entity = $this->wrapped->find(
            $entityName,
            $id
        );
        if ($entity === null) {
            throw new ServiceException(
                basename(
                    str_replace(
                        '\\',
                        '/',
                        $entityName
                    )
                ) .
                ' not found',
            );
        }

        return $entity;
    }

}
