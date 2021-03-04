<?php
namespace App\Repositories\OrderDetail;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;
use App\Models\OrderDetails;

class OrderDetailEloquentRepository extends EloquentRepository implements OrderDetailRepositoryInterface
{
    public function getModel()
    {
        return OrderDetails::class;
    }

    public function createMultipleDada(array $attribute)
    {
        return $this->model::insert($attribute);
    }
}
