<?php

namespace App\Providers;

use App\Http\Controllers\ProjectController;
use App\Interfaces\AccountRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Repositories\AccountRepository;
use App\Repositories\ProjectRepository;
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
        $this->app->bind(AccountRepositoryInterface::class,AccountRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class,ProjectRepository::class);
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
