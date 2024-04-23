<?php

namespace App\Providers;

use App\Interfaces\AdminInterface;
use App\Interfaces\AuthInterface;
use App\Interfaces\TaskInterface;
use App\Interfaces\UserInterface;
use App\Repository\AdminRepository;
use App\Repository\AuthRepository;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        // Start App Classes And Interfaces ===========
        $this->app->bind(AuthInterface::class,AuthRepository::class);
        $this->app->bind(AdminInterface::class,AdminRepository::class);
       $this->app->bind(UserInterface::class,UserRepository::class);
       $this->app->bind(TaskInterface::class,TaskRepository::class);
        // End App Classes And Interfaces =============

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
