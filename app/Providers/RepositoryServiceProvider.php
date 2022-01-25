<?php

namespace App\Providers;

use App\Contracts\University\collegeContract;
use App\Contracts\University\commanSettingContract;
use App\Contracts\University\subjectContract;
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
