<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        if (file_exists(app_path('helper.php'))) {
            require_once app_path('helper.php');
        }


        View::composer('frontend.layouts.header', function ($view) {
            $headerCategories = Category::where('status', 'active')
                ->with(['subcategories' => function ($query) {
                    $query->where('status', 'active')
                        ->with(['products' => function ($q) {
                            $q->where('status', 'active')->take(6);
                        }]);
                }])
                ->get();

            $view->with('headerCategories', $headerCategories);
        });

    }
}
