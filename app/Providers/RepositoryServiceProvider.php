<?php

namespace App\Providers;

use App\Contracts\college\CourseContract;
use App\Contracts\college\MeritContract;
use App\Contracts\student\AddmissionContract;
use App\Contracts\student\MarksContract;
use App\Contracts\University\collegeContract;
use App\Contracts\University\commanSettingContract;
use App\Contracts\University\subjectContract;
use App\Repositories\college\CourseRepository;
use App\Repositories\college\MeritRepository;
use App\Repositories\student\AddmissionRepository;
use App\Repositories\student\MarksRepository;
use App\Repositories\university\collegeRepository;
use App\Repositories\university\commanSettingRepository;
use App\Repositories\university\subjectRepository;
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
        $this->app->bind(collegeContract::class,collegeRepository::class);
        $this->app->bind(subjectContract::class,subjectRepository::class);
        $this->app->bind(commanSettingContract::class,commanSettingRepository::class);
        $this->app->bind(CourseContract::class,CourseRepository::class);
        $this->app->bind(MeritContract::class,MeritRepository::class);
        $this->app->bind(AddmissionContract::class, AddmissionRepository::class);
        $this->app->bind(MarksContract::class, MarksRepository::class);
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
