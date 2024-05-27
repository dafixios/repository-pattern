<?php

namespace App\Services\Customer;

use App\DataTransferObjects\Customer\CustomerDto;
use App\Enums\CustomerSource;
use App\Models\Customer;

class CustomerService
{
    public function store(
       CustomerDto $customerDto
    ) {
        return Customer::create([
            'first_name' => $customerDto->first_name,
            'last_name' => $customerDto->last_name,
            'email' => $customerDto->email,
            'phone' => $customerDto->phone,
            'address' => $customerDto->address,
            'city' => $customerDto->city,
            'state' => $customerDto->state,
            'zip' => $customerDto->zip,
            'country' => $customerDto->country,
            'company' => $customerDto->company,
            'source' => $customerDto->source,
        ]);
    }


    public function update(
        Customer $customer,
        CustomerDto $customerDto
    ) {
        return tap($customer)->update([
            'first_name' => $customerDto->first_name,
            'last_name' => $customerDto->last_name,
            'email' => $customerDto->email,
            'phone' => $customerDto->phone,
            'address' => $customerDto->address,
            'city' => $customerDto->city,
            'state' => $customerDto->state,
            'zip' => $customerDto->zip,
            'country' => $customerDto->country,
            'company' => $customerDto->company,
        ]);
    }

}
