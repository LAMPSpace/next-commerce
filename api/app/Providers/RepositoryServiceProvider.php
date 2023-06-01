<?php

namespace App\Providers;

use App\Interfaces\Repository\CategoryRepositoryInterface;
use App\Interfaces\Repository\HomeSettingRepositoryInterface;
use App\Interfaces\Repository\ManufacturerRepositoryInterface;
use App\Interfaces\Service\CategoryServiceInterface;
use App\Interfaces\Service\HomeSettingServiceInterface;
use App\Interfaces\Service\ManufacturerServiceInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\HomeSettingRepository;
use App\Repositories\ManufacturerRepository;
use App\Services\CategoryService;
use App\Services\HomeSettingService;
use App\Services\ManufacturerService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(ManufacturerServiceInterface::class, ManufacturerService::class);

        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ManufacturerRepositoryInterface::class, ManufacturerRepository::class);

        $this->app->bind(HomeSettingServiceInterface::class, HomeSettingService::class);
        $this->app->bind(HomeSettingRepositoryInterface::class, HomeSettingRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
