<?php

namespace App\Services\Customer;

use App\Contracts\Repositories\Customer\CustomerRepositoryInterface;
use App\DataTransferObjects\Customer\CustomerDto;

class CustomerService
{
    public function __construct(
        protected CustomerRepositoryInterface $customerRepository
    )
    {}

    /**
     * Store a customer using the repository
     * @param CustomerDto $customerDto
     * @return mixed
     */
    public function store(
        CustomerDto $customerDto
    ): mixed {
        return $this->customerRepository->store($customerDto);
    }


    /**
     * Update a customer using the repository
     * @param int $id
     * @param CustomerDto $customerDto
     * @return mixed
     */
    public function update(
        int $id,
        CustomerDto $customerDto
    ) {
        return $this->customerRepository->update($id, $customerDto);
    }

    /**
     * Delete a customer using the repository
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->customerRepository->delete($id);
    }



}
