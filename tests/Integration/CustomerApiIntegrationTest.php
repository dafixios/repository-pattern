<?php

namespace Tests\Integration;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerApiIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a new customer
     */
    public function test_create_new_customer(): void
    {
        // Customer data
        $customerData = [
            'payload' => [
                'customer' => [
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'email' => 'john.doe@example.com',
                ]
            ]
        ];

        // Create the post request
        $response = $this->postJson('/api/v1/customers', $customerData);

        // Return a 201 status code
        $response->assertStatus(201);

        // Verify if the customer was created
        $this->assertDatabaseHas('customers', [
            'email' => 'john.doe@example.com',
        ]);
    }

    /**
     * Test error when creating a customer with invalid data
     */
    public function test_error_when_creating_customer_with_invalid_data(): void
    {
        // Customer data
        $customerData = [
            'payload' => [
                'customer' => [
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'email' => '',
                ]
            ]
        ];

        // Create the post request
        $response = $this->postJson('/api/v1/customers', $customerData);

        // Return a 422 status code
        $response->assertStatus(422);

        // Verify if the customer was not created
        $this->assertDatabaseMissing('customers', [
            'email' => '',
        ]);
    }

    /**
     * Test updating an existing customer.
     */
    public function test_update_customer(): void
    {
        // Create a customer to update
        $customerData = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
        ];

        $customer = Customer::create($customerData);

        // New data for updating the customer
        $updateData = [
            'payload' => [
                'customer' => [
                    'first_name' => 'Jane',
                    'last_name' => 'Doe',
                    'email' => 'jane.doe@example.com',
                ]
            ]
        ];

        // Create the put request to update the customer
        $response = $this->putJson('/api/v1/customers/' . $customer->id, $updateData);

        // Return a 200 status code
        $response->assertStatus(200);

        // Verify if the customer was updated
        $this->assertDatabaseHas('customers', [
            'id' => $customer->id,
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'jane.doe@example.com',
        ]);
    }


    /**
     * Test deleting an existing customer.
     */
    public function test_delete_customer(): void
    {
        // Create a customer to delete
        $customerData = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'jane.doe@example.com',
        ];

        $customer = Customer::create($customerData);

        // Create the delete request to delete the customer
        $response = $this->deleteJson('/api/v1/customers/' . $customer->id);

        // Return a 200 status code
        $response->assertStatus(200);

        // Verify if the customer was deleted
        $this->assertDatabaseMissing('customers', [
            'id' => $customer->id,
        ]);
    }
}
