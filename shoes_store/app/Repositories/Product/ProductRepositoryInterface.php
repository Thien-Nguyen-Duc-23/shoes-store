<?php
namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    public function getNewProducts($limit);

    public function getSellProducts($limit);
}
