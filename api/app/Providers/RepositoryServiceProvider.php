<?php

namespace App\Providers;

use App\Interfaces\Repository\BrandRepositoryInterface;
use App\Interfaces\Repository\CategoryRepositoryInterface;
use App\Interfaces\Repository\HomeSettingRepositoryInterface;
use App\Interfaces\Service\BrandServiceInterface;
use App\Interfaces\Service\CategoryServiceInterface;
use App\Interfaces\Service\HomeSettingServiceInterface;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\HomeSettingRepository;
use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\HomeSettingService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(HomeSettingServiceInterface::class, HomeSettingService::class);
        $this->app->bind(BrandServiceInterface::class, BrandService::class);

        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(HomeSettingRepositoryInterface::class, HomeSettingRepository::class);
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
