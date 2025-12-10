<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use BezhanSalleh\LanguageSwitch\LanguageSwitch;
use BezhanSalleh\LanguageSwitch\Enums\Placement;

class LanguageSwitchProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['en', 'ar'])                 // Only English & Arabic
                ->visible(outsidePanels: true)          // Show even on login page
                ->outsidePanelPlacement(Placement::BottomRight)
                ->displayLocale('en')                   // Shows "English" / "العربية"
                ->flags([
                    'en' => asset('flags/gb.svg'),      // British flag for English
                    'ar' => asset('flags/sa.svg'),      // Saudi flag for Arabic
                ])
                ->flagsOnly()                           // Clean look – only flags
                ->circular();                           // Modern circular style
        });
    }
}
