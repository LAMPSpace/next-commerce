<?php

namespace Tests\Unit\Repositories;

use PHPUnit\Framework\TestCase;
use Mockery;
use App\Models\Brand;
use App\Repositories\BrandRepository;

class BrandTest extends TestCase
{
    public function test_get_model(): void
    {
        $brand = Mockery::mock(Brand::class);
        $repository = new BrandRepository($brand);
        $this->assertEquals($brand, $repository->getModel());
    }

    public function test_create_a_new_brand(): void
    {
        $brand = Mockery::mock(Brand::class);
        $brand->shouldReceive('create')
            ->with([])
            ->andReturn($brand);
        $repository = new BrandRepository($brand);
        $this->assertEquals($brand, $repository->create([]));
    }

    public function test_find_a_brand(): void
    {
        $brand = Mockery::mock(Brand::class);
        $brand->shouldReceive('findOrFail')
            ->with(1)
            ->andReturn($brand);
        $repository = new BrandRepository($brand);
        $this->assertEquals($brand, $repository->find(1));
    }

    public function test_update_a_brand(): void
    {
        $brand = Mockery::mock(Brand::class);
        $brand->shouldReceive('findOrFail')
            ->with(1)
            ->andReturn($brand)
            ->shouldReceive('update')
            ->with(["name" => "test"])
            ->andReturn(true);

        $repository = new BrandRepository($brand);

        $this->assertEquals(true, $repository->update(["name" => "test"], 1));
    }

    public function test_delete_a_brand(): void
    {
        $brand = Mockery::mock(Brand::class);
        $brand->shouldReceive('findOrFail')
            ->with(1)
            ->andReturn($brand)
            ->shouldReceive('delete')
            ->withNoArgs()
            ->andReturn(true);

        $repository = new BrandRepository($brand);

        $this->assertEquals(true, $repository->delete(1));
    }
}
