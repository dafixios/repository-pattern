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

    public function store(
        CustomerDto $customerDto
    ) {
        return $this->customerRepository->store($customerDto);
    }


    public function update(
        int $id,
        CustomerDto $customerDto
    ) {
        return $this->customerRepository->update($id, $customerDto);
    }

    public function delete(int $id)
    {
        return $this->customerRepository->delete($id);
    }



}
