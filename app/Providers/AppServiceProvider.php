<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\GeneralSetting;
use App\Models\About;
use App\Http\Responses\LogoutResponse;
use Illuminate\Support\Facades\Config;
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

        $mail = GeneralSetting::first();
        Config::set('mail.mailers.smtp.host', $mail->email_settings['smtp_host'] ?? 'sandbox.smtp.mailtrap.io');
        Config::set('mail.mailers.smtp.port', $mail->email_settings['smtp_port'] ?? '2525');
        Config::set('mail.mailers.smtp.username', $mail->email_settings['smtp_username'] ?? '025d71d3b87eaa');
        Config::set('mail.mailers.smtp.password', $mail->email_settings['smtp_password'] ?? '6d1435bd200ba8');
        Config::set('mail.mailers.smtp.encryption', $mail->email_settings['smtp_encryption'] ?? 'tls');
        Config::set('mail.from.address', $mail->email_from_address ?? 'gnosis@gnosis.com');
        Config::set('mail.from.name', $mail->email_from_name ?? 'Gnosis');

        $company_profile=About::select('logo')->first();
        view()->share('company_profile', $company_profile);

        $general_setting = GeneralSetting::select(['site_name', 'site_description'])->first();
        view()->share('general_setting', $general_setting);

        $meta_data = Setting::select(['meta_title', 'meta_keyword', 'meta_description', 'meta_image', 'more_seo_metadata', 'social_media_seo_meta_data'])->first();
        $moreSeoMetadata = $meta_data->more_seo_metadata ?? [];
        $socialMediaSeoMetaData = $meta_data->social_media_seo_meta_data ?? [];
        view()->share([
            'meta_data' => $meta_data,
            'moreSeoMetadata' => $moreSeoMetadata,
            'socialMediaSeoMetaData' => $socialMediaSeoMetaData,
        ]);
    }
}
