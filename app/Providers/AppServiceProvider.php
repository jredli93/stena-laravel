<?php

namespace App\Providers;

use App\Models\News;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('pages.*', function ($view) {
            $news = News::orderBy('id','desc')->limit(4)->get();
            $view->with('newsFooter',$news);
        });
    }
}
