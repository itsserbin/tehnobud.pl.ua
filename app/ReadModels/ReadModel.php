<?php

namespace App\ReadModels;

use App\Exceptions\WriteOperationIsNotAllowedForReadModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReadModel.
 */
abstract class ReadModel extends Model
{

    protected $keyType = 'string';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @param  Builder  $query
     *
     * @return bool
     */
    protected function performInsert(Builder $query): bool
    {
        if ( ! app()->runningInConsole()
             && app()->environment('production')) {
            throw new WriteOperationIsNotAllowedForReadModel();
        }

        return parent::performInsert($query);
    }

    /**
     * @param  Builder  $query
     *
     * @return bool
     */
    protected function performUpdate(Builder $query): bool
    {
        throw new WriteOperationIsNotAllowedForReadModel();
    }

    /**
     * @return void
     */
    protected function performDeleteOnModel(): void
    {
        throw new WriteOperationIsNotAllowedForReadModel();
    }

    /**
     * @return void
     */
    public function truncate(): void
    {
        throw new WriteOperationIsNotAllowedForReadModel();
    }

}
