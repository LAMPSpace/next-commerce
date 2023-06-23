<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\CreateBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Http\Resources\Brand\BrandCollection;
use App\Http\Resources\Brand\BrandResource;
use App\Interfaces\Service\BrandServiceInterface;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $service;

    public function __construct(BrandServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $brands = $this->service->list($request->all());
        return new BrandCollection($brands);
    }

    public function store(CreateBrandRequest $request)
    {
        $brand = $this->service->create($request->all());
        return new BrandResource($brand);
    }

    public function show(string $id)
    {
        $brand = $this->service->find($id);
        return new BrandResource($brand);
    }

    public function update(UpdateBrandRequest $request, string $id)
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
