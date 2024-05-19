<?php

namespace App\Providers;

use App\Models\About;
use App\Models\FunctionAvailable;
use Illuminate\Support\Facades\Auth;
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
        View::composer('*', function ($view) {
            $about  = About::first();
            if (Auth::check()) {
                $about  = About::first();
                $function_available = FunctionAvailable::select('function_availables.*')
                    ->join('functions as f', 'f.id', '=', 'function_availables.function_id')
                    ->where('function_availables.role_id', auth()->user()->roles_id)
                    ->orderBy('f.id', 'ASC')->get();
                View::share(([
                    'about' => $about,
                    'function_available' => $function_available,
                ]));
            }
            View::share(([
                'about' => $about,
            ]));
        });
    }
}
