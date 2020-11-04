<?php
namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    public function getNewProducts($limit);

    public function getSellProducts($limit);

    public function getDetailProductBySlug($slug);

    public function getRelationProduct($id, $arrayCate, $limit);
}
