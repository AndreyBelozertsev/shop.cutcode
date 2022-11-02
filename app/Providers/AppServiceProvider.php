<?php

namespace App\Providers;

use App\Http\Kernel;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::shouldBeStrict( !app()->isProduction() );
       

        if(app()->isProduction()){
            
            DB::listen(function ($query){
                if($query->time > 100){
                    logger()
                    ->channel('telegram')
                    ->debug('query longer than 1ms'.$query->sql,$query->bindings);
                }
            });
       
            app(Kernel::class)->whenRequestLifecycleIsLongerThan(
                CarbonInterval::seconds(4),
                function(){
                    logger()
                        ->channel('telegram')
                        ->debug('whenRequestLifecycleIsLongerThan'.request()->url());
                }
            );

        }
    }
}
