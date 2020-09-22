<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        view()->composer(
            ['partials.categoryNav', 'partials.searchfrm', 'lists.categories', 'lists.countries', 'lists.currencies', 'ads.edit', 'ads.create'],'App\Http\ViewComposers\CategoryComposer'
        );

        view()->composer(
            ['partials.categoryNav', 'partials.searchfrm', 'lists.categories', 'lists.countries', 'lists.currencies', 'ads.edit', 'ads.create'],'App\Http\ViewComposers\CountryComposer'
        );

        view()->composer(
            ['partials.categoryNav', 'partials.searchfrm', 'lists.categories', 'lists.countries', 'lists.currencies', 'ads.edit', 'ads.create'],'App\Http\ViewComposers\CurrencyComposer'
        );
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\HTTP\ViewComposers\CategoryComposer');
        $this->app->singleton('App\HTTP\ViewComposers\CountryComposer');
        $this->app->singleton('App\HTTP\ViewComposers\CurrencyComposer');

    }
}
