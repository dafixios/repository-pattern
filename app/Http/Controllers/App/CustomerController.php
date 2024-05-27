<?php

namespace App\Http\Controllers\App;

use App\DataTransferObjects\Customer\CustomerDto;
use App\Enums\CustomerSource;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\CustomerRequest;
use App\Http\Resources\App\CustomerResource;
use App\Models\Customer;
use App\Services\Customer\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(
        protected CustomerService $customerService,
    ) {
    }

    /**
     * Create a new customer
     * @param CustomerRequest $request
     * @return CustomerResource
     */
    public function store(CustomerRequest $request): CustomerResource
    {
        $customer = $this->customerService->store(
            CustomerDto::fromAppRequest($request)
        );

        return CustomerResource::make(
            $customer
        );
    }

    /**
     * Update a customer
     * @param CustomerRequest $request
     * @param Customer $customer
     * @return CustomerResource
     */
    public function update(CustomerRequest $request, Customer $customer): CustomerResource
    {
        $customer = $this->customerService->update(
            $customer->id,
            CustomerDto::fromAppRequest($request)
        );
        return CustomerResource::make(
            $customer
        );
    }

}
