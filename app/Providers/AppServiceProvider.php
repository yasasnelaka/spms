<?php

namespace App\Providers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;

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
        $notification= DB::table('notifications')->where('status','=','new')
        ->count();

        View::share('notification',$notification);

        $news=DB::table('news')
            ->orderBy('id','desc')
            ->get();

       View::share('news',$news);

        $subject_list = DB::table('subjects')
            ->select('id','subject_name')
            ->get()->all();
        View::share('subject_list',$subject_list);

        $year=DB::table('marks')->select('year')->distinct()->get();
        View::share('year_list',$year);
    }

}
