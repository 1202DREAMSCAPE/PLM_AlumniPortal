<?php

namespace App\Providers\Filament;

use App\Filament\Auth\Login;
use Awcodes\Curator\CuratorPlugin;
use Awcodes\FilamentGravatar\GravatarPlugin;
use Awcodes\FilamentGravatar\GravatarProvider;
use BezhanSalleh\FilamentExceptions\FilamentExceptionsPlugin;
use Croustibat\FilamentJobsMonitor\FilamentJobsMonitorPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Pboivin\FilamentPeek\FilamentPeekPlugin;
use App\Providers\Filament\Variants;
use Illuminate\Contracts\View\View;
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;
use Swis\Filament\Backgrounds\ImageProviders\MyImages;
use Filament\Support\Enums\MaxWidth;
use App\Models\ContactInfo;
use App\Observers\ContactInfoObserver;


class AlumniPanelProvider extends PanelProvider
{
    public function boot()
    {
        ContactInfo::observe(ContactInfoObserver::class);
    }
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('alumni')
            ->path('alumni')
            ->topNavigation()
            ->spa()
            ->login(Login::class)
            //->registration()    
            ->databaseNotifications(true)
            //->font('Inter')
            ->plugins([
                BreezyCore::make()
                    ->myProfile(
                        shouldRegisterUserMenu: true,
                        shouldRegisterNavigation: false,
                        hasAvatars: true
                    ),
                FilamentPeekPlugin::make()
                    ->disablePluginStyles(),
                FilamentBackgroundsPlugin::make()
                ->imageProvider(
                    MyImages::make()
                        ->directory('images/backgrounds')
                ),
        ])
            // ->navigationGroups([
            //     'About Me',
            // ])
            ->favicon(asset('/favicon-32x32.png'))
            ->brandLogo(fn () => view('components.logo'))
            ->brandLogoHeight('50px')
            ->renderHook(
                'panels::body.end',
                fn (): View => view('components.footer'),  
            )
            ->viteTheme('resources/css/filament/alumni/theme.css')
            ->colors([
                'primary' => Color::Blue,
            ])
            ->viteTheme('resources/css/admin.css')
            ->discoverResources(in: app_path('Filament/Alumni/Resources'), for: 'App\\Filament\\Alumni\\Resources')
            ->discoverPages(in: app_path('Filament/Alumni/Pages'), for: 'App\\Filament\\Alumni\\Pages')
            ->discoverClusters(in: app_path('Filament/Alumni/Clusters'), for: 'App\\Filament\\Alumni\\Clusters')
            ->pages([
                Pages\Dashboard::class,
                ])
            ->discoverWidgets(in: app_path('Filament/Alumni/Widgets'), for: 'App\\Filament\\Alumni\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                //\App\Filament\Alumni\Widgets\AlumniConnect::class,
                \App\Filament\Alumni\Widgets\FaqWidget::class,
                \App\Filament\Alumni\Widgets\PhotoSlideshowWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
    
}
