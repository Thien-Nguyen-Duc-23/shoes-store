<?php
namespace App\Repositories\Customer;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Repositories\Customer\CustomerRepositoryInterface;

class CustomerEloquentRepository extends EloquentRepository implements CustomerRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function create(array $attribute)
    {
        return $this->model::create($attribute);
    }

    public function findByEmail($email)
    {
        return $this->model::where('email', $email)->first();
    }
}
