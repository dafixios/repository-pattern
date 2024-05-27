<?php

namespace App\Http\Controllers\Api;

use App\DataTransferObjects\Customer\CustomerDto;
use App\Enums\CustomerSource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CustomerRequest;
use App\Http\Resources\Api\CustomerResource;
use App\Models\Customer;
use App\Services\Customer\CustomerService;

class CustomerController extends Controller
{
    public function __construct(
        protected CustomerService $customerService,
    )
    {}

    public function store(CustomerRequest $request): CustomerResource
    {

        $customer = $this->customerService->store(
            CustomerDto::fromApiRequest($request)
        );
        return CustomerResource::make(
            $customer
        );
    }

    public function update(CustomerRequest $request, Customer $customer): CustomerResource
    {
        $customer = $this->customerService->update(
            $customer,
            CustomerDto::fromApiRequest($request)
        );
        return CustomerResource::make(
            $customer
        );
    }
}
