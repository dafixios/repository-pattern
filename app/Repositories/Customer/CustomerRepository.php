<?php

namespace App\Repositories\Customer;

use App\Contracts\Repositories\Customer\CustomerRepositoryInterface;
use App\DataTransferObjects\Customer\CustomerDto;
use App\Models\Customer;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function store(CustomerDto $customerDto): mixed
    {
        return $this->format($this->model->create([
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
        ]));
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, CustomerDto $customerDto): \stdClass|bool
    {
        $model = $this->model->find($id);

        if ($model) {
            $model = tap($model)->update([
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
            return $this->format($model);
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): bool
    {
        $model = $this->model->find($id);

        if ($model) {
            return $model->delete();
        }
        return false;
    }
}
