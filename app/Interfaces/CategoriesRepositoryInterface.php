<?php

namespace App\Interfaces;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

interface CategoriesRepositoryInterface
{
    public function getAllCategories();
    public function createCategory(StoreCategoryRequest $request);
    public function deleteCategory(Category $category);
}
