<?php

namespace App\Repositories;

use App\Http\Requests\StoreCategoryRequest;
use App\Interfaces\CategoriesRepositoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoriesRepository implements CategoriesRepositoryInterface
{

    public function getAllCategories() : Collection
    {
        return Category::all();
    }

    public function createCategory(StoreCategoryRequest $request) : Category
    {
        $category = new Category;
        $category->name = $request->input('name');

        $category->save();
        return $category;
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        return $category;
    }
}
