<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.sidebar', function ($view) {
        	$archives = \App\Post::archives();
        	$tags = \App\Tag::has('posts')->pluck('name');
        	$most_commented = \App\Post::MostCommented();

        	$view->with(compact('archives', 'tags', 'most_commented'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		$this->app->singleton(Stripe::class, function () {
			return new Stripe(config('services.stripe.secret'));
		});
    }
}
