<?php

namespace GetThingsDone\DynamicConfig;

use Illuminate\Support\ServiceProvider;
use GetThingsDone\DynamicConfig\Commands\DynamicConfigCommand;

class DynamicConfigServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/dynamic-config.php' => config_path('dynamic-config.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/dynamic-config'),
            ], 'views');

            $migrationFileName = 'create_dynamic_config_table.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes([
                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
                ], 'migrations');
            }

            $this->commands([
                DynamicConfigCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dynamic-config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/dynamic-config.php', 'dynamic-config');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}
