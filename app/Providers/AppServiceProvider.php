<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
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
        view()->composer('layouts.image',function($view){
            $image = DB::table('barangayimages')
            ->where('barangay_id','=','1')->first();
            $view->with('image',$image);

        });
        view()->composer('pages.certificate',function($view){
            $layout = DB::table('certificate_layouts')
            ->where('layout_id','=','1')->first();
            $view->with('layout',$layout);

        });


    }
}
