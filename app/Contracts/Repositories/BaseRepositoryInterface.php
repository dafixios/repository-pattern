<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     * Find Resource
     * @param int $id
     * @return mixed
     */
    public function find(int $id): mixed;


}
