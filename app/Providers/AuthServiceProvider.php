<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
//        Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
//
//        Passport::useTokenModel(Token::class);
//        Passport::useRefreshTokenModel(RefreshToken::class);
//        Passport::useAuthCodeModel(AuthCode::class);
//        Passport::useClientModel(Client::class);
//        Passport::usePersonalAccessClientModel(PersonalAccessClient::class);
//
//        Passport::tokensCan([
//            'place-orders' => 'Place orders',
//            'check-status' => 'Check order status',
//        ]);
//        Passport::routes();
    }
}
