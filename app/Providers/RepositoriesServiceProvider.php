<?php

namespace App\Providers;

use App\Repositories\StudentClassesRepository;
use App\Repositories\StudentClassesRepositoryInterface;
use App\Repositories\StudentGroupRepository;
use App\Repositories\StudentGroupRepositoryInterface;
use App\Repositories\StudentShiftRepository;
use App\Repositories\StudentShiftRepositoryInterface;
use App\Repositories\TuitionFeeCategoryRepository;
use App\Repositories\TuitionFeeCategoryRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\YearsRepository;
use App\Repositories\YearsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(StudentClassesRepositoryInterface::class, StudentClassesRepository::class);
        $this->app->bind(YearsRepositoryInterface::class, YearsRepository::class);
        $this->app->bind(StudentShiftRepositoryInterface::class, StudentShiftRepository::class);
        $this->app->bind(TuitionFeeCategoryRepositoryInterface::class, TuitionFeeCategoryRepository::class);
        $this->app->bind(StudentGroupRepositoryInterface::class, StudentGroupRepository::class);
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
