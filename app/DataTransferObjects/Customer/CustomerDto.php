<?php

namespace App\DataTransferObjects\Customer;

use App\Enums\CustomerSource;
use App\Http\Requests\Api\CustomerRequest as ApiCustomerRequest;
use App\Http\Requests\App\CustomerRequest as AppCustomerRequest;

class CustomerDto
{

    /**
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param string|null $phone
     * @param string|null $address
     * @param string|null $city
     * @param string|null $state
     * @param string|null $zip
     * @param string|null $country
     * @param string|null $company
     * @param CustomerSource $source
     */
    public function __construct(
        public readonly string $first_name,
        public readonly string $last_name,
        public readonly string $email,
        public readonly ?string $phone,
        public readonly ?string $address,
        public readonly ?string $city,
        public readonly ?string $state,
        public readonly ?string $zip,
        public readonly ?string $country,
        public readonly ?string $company,
        public readonly CustomerSource $source
    ) {
    }

    /**
     * Handle the creation of a new customer from the app
     * @param AppCustomerRequest $request
     * @return CustomerDto
     */
    public static  function fromAppRequest(AppCustomerRequest $request): CustomerDto
    {
        return new self(
            first_name: $request->validated('first_name'),
            last_name: $request->validated('last_name'),
            email: $request->validated('email'),
            phone: $request->validated('phone'),
            address: $request->validated('address'),
            city: $request->validated('city'),
            state: $request->validated('state'),
            zip: $request->validated('zip'),
            country: $request->validated('country'),
            company: $request->validated('company'),
            source: CustomerSource::Api,
        );
    }

    /**
     * Handle the creation of a new customer from the API
     * @param ApiCustomerRequest $request
     * @return CustomerDto
     */
    public static  function fromApiRequest(ApiCustomerRequest $request): CustomerDto
    {
        return new self(
            first_name: $request->validated('payload.customer.first_name'),
            last_name: $request->validated('payload.customer.last_name'),
            email: $request->validated('payload.customer.email'),
            phone: $request->validated('payload.customer.phone'),
            address: $request->validated('payload.customer.address'),
            city: $request->validated('payload.customer.city'),
            state: $request->validated('payload.customer.state'),
            zip: $request->validated('payload.customer.zip'),
            country: $request->validated('payload.customer.country'),
            company: $request->validated('payload.customer.company'),
            source: CustomerSource::Api,
        );
    }



}
