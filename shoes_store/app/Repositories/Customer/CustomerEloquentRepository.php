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
}
