<?php
namespace App\Repositories\Order;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Orders;

class OrderEloquentRepository extends EloquentRepository implements OrderRepositoryInterface
{
    public function getModel()
    {
        return Orders::class;
    }

    public function create(array $attribute)
    {
        return $this->model::create($attribute);
    }
}
