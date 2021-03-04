<?php
namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    public function getParentCategory();

    public function getTreeViewCategory();

    public function getCategoryHomePage($limit);

    public function getCategoryBySlug($slug);
}
