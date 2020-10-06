<?php 

namespace App\Services\API\V1\Services\Category;

use App\Category;
use App\Services\API\V1\Interfaces\CategoryInterface;
use Auth;

class CategoryService implements CategoryInterface
{
    public function gets() : array
    {
        $category = Category::all();
        return ["result" => $category, 'status' => 200];
    }
} 