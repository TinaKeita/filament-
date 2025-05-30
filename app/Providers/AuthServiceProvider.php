<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Filament\Facades\Filament;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerPolicies();

        Filament::serving(function () {
            Gate::define('viewFilament', function (User $user) {
                return true;  // allow all users to access Filament for now
            });
        });
    }
}
