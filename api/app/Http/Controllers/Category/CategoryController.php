<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Category\CategoryResource;
use App\Interfaces\Service\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $service;

    public function __construct(CategoryServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $categories = $this->service->list($request->all());
        return new CategoryCollection($categories);
    }

    public function store(CreateCategoryRequest $request)
    {
        $category = $this->service->create($request->all());
        return new CategoryResource($category);
    }

    public function show(string $id)
    {
        $category = $this->service->find($id);
        return new CategoryResource($category);
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {
        $update = $this->service->update($request->all(), $id);
        return $update;
    }

    public function destroy(string $id)
    {
        $delete = $this->service->delete($id);
        return $delete;
    }
}
