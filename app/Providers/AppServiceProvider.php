<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\GeneralSetting;
use App\Http\Responses\LogoutResponse;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LogoutResponseContract::class, LogoutResponse::class);
    }

    /**
     * Bootstrap any ccc services.
     */
    public function boot(): void
    {
        
        $general_setting=GeneralSetting::select(['site_name','site_description'])->first();
        view()->share('general_setting',$general_setting);
        
        $meta_data = Setting::select(['meta_title','meta_keyword','meta_description','meta_image','more_seo_metadata','social_media_seo_meta_data'])->first();
        $moreSeoMetadata = $meta_data->more_seo_metadata ?? [];
        $socialMediaSeoMetaData = $meta_data->social_media_seo_meta_data ?? [];
        view()->share([
            'meta_data'=>$meta_data,
            'moreSeoMetadata'=>$moreSeoMetadata,
            'socialMediaSeoMetaData'=>$socialMediaSeoMetaData,
        ]);
    }
}
