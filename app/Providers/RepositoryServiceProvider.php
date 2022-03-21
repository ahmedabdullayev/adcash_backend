<?php

namespace App\Providers;

use App\Interfaces\CategoriesRepositoryInterface;
use App\Interfaces\PostsRepositoryInterface;
use App\Repositories\CategoriesRepository;
use App\Repositories\PostsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoriesRepositoryInterface::class, CategoriesRepository::class);
        $this->app->bind(PostsRepositoryInterface::class, PostsRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
