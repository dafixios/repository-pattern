<?php

namespace App\Http\Controllers\Api;

use App\DataTransferObjects\Customer\CustomerDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CustomerRequest;
use App\Http\Resources\Api\CustomerResource;
use App\Models\Customer;
use App\Services\Customer\CustomerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    public function __construct(
        protected CustomerService $customerService,
    ) {
    }


    /**
     * Create a new customer
     * @param CustomerRequest $request
     * @return JsonResponse
     */
    public function store(CustomerRequest $request): JsonResponse
    {
        $customer = $this->customerService->store(
            CustomerDto::fromApiRequest($request)
        );

        return response()->json(
            CustomerResource::make($customer),
            Response::HTTP_CREATED
        );
    }

    /**
     * Update a customer
     * @param CustomerRequest $request
     * @param Customer $customer
     * @return JsonResponse
     */
    public function update(CustomerRequest $request, Customer $customer): JsonResponse
    {
        $customer = $this->customerService->update(
            $customer->id,
            CustomerDto::fromApiRequest($request)
        );
        return response()->json(
            CustomerResource::make($customer),
            Response::HTTP_OK
        );
    }

    /**
     * Delete a customer
     * @param Customer $customer
     * @return JsonResponse
     */
    public function destroy(Customer $customer): JsonResponse
    {
        $this->customerService->delete($customer->id);
        return response()->json([
            'message' => 'Customer deleted successfully',
            Response::HTTP_OK
        ]);
    }
}
