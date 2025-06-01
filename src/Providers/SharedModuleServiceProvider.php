<?php

namespace Adalace\SharedModule;

use Illuminate\Support\ServiceProvider;
use function resource_path;

class SharedModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load your backend routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Load blade views (if any)
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'shared');

        // OPTIONAL: You don’t need to load .vue files this way — keep them for publishing only
        // $this->loadViewsFrom(__DIR__ . '/../resources/js/Components', 'shared-vue'); // <-- Remove if not rendering Vue server-side

        // Publish Vue components into app's resources/js/Shared folder
        $this->publishes([
            __DIR__ . '/../resources/js/Components' => resource_path('js/Shared'),
        ], 'vue-components');
    }

    public function register()
    {
        // You can bind services here if needed
    }
}