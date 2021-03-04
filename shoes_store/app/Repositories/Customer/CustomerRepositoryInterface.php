<?php
namespace App\Repositories\Customer;

interface CustomerRepositoryInterface
{
    public function create(array $attribute);
    
    public function findByEmail($email);
}
