<?php

namespace App\Contracts\Repositories\Customer;

use App\DataTransferObjects\Customer\CustomerDto;
use App\Models\Customer;

interface CustomerRepositoryInterface
{
    /**
     * Create Customer
     * @param CustomerDto $customerDto
     * @return mixed
     */
    public function store(CustomerDto $customerDto): mixed;

    /**
     * Update Customer
     * @param CustomerDto $customerDto
     * @return mixed
     */
    public function update(int $id, CustomerDto $customerDto): mixed;

    /**
     * Delete Customer
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

}
