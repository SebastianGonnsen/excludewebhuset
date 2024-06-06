<?php

namespace SebastianGonnsen\ExcludeWebhuset;

use Illuminate\Support\ServiceProvider;
use App\Models\User;

class ExcludeWebhusetServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/excludewebhuset.php', 'excludewebhuset');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/excludewebhuset.php' => config_path('excludewebhuset.php'),
        ]);

        $excludedDomain = config('excludewebhuset.excluded_domain', '%@webhusetballum.dk');
        User::addGlobalScope(new ExcludeWebhusetScope($excludedDomain));
    }
}
