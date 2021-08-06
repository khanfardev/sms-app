<?php

namespace App\Providers;

use App\Repositories\ClassSubjectRepository;
use App\Repositories\ClassSubjectRepositoryInterface;
use App\Repositories\JobTitleRepository;
use App\Repositories\JobTitleRepositoryInterface;
use App\Repositories\StudentClassesRepository;
use App\Repositories\StudentClassesRepositoryInterface;
use App\Repositories\StudentGroupRepository;
use App\Repositories\StudentGroupRepositoryInterface;
use App\Repositories\StudentShiftRepository;
use App\Repositories\StudentShiftRepositoryInterface;
use App\Repositories\SubjectRepository;
use App\Repositories\SubjectRepositoryInterface;
use App\Repositories\TuitionFeeAmountRepository;
use App\Repositories\TuitionFeeAmountRepositoryInterface;
use App\Repositories\TuitionFeeCategoryRepository;
use App\Repositories\TuitionFeeCategoryRepositoryInterface;
use App\Repositories\TypeExamRepository;
use App\Repositories\TypeExamRepositoryInterface;
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
        $this->app->bind(TuitionFeeAmountRepositoryInterface::class, TuitionFeeAmountRepository::class);
        $this->app->bind(TypeExamRepositoryInterface::class, TypeExamRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        $this->app->bind(ClassSubjectRepositoryInterface::class, ClassSubjectRepository::class);
        $this->app->bind(JobTitleRepositoryInterface::class, JobTitleRepository::class);

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
