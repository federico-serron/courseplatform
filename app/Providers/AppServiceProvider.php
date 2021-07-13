<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Observers\LessonObserver;
use App\Models\Lesson;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Lesson::observe(LessonObserver::class);

        Blade::directive('routeIs', function ($expression) {
            return "<?php if(Request::url() == route($expression)): ?>";
        });
        
    }
}
