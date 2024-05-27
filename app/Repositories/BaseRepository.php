<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(
        protected Model $model
    ) {}

    /**
     * @inheritDoc
     */
    public function find(int $id): ?array
    {
         return $this->model->findOrFail($id)?->toArray();
    }

    protected function format(Model $model): \stdClass
    {
        return (object) $model->toArray();
    }
}
