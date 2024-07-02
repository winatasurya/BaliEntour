<?php 

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Laravel\Fortify\Features;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(LoginResponse::class, function () {
            return new class implements LoginResponse {
                public function toResponse($request)
                {
                    if (Auth::user()->role === 'wisatawan') {
                        return redirect()->route('welcome');
                    } elseif (Auth::user()->role === 'perusahaan') {
                        return redirect()->route('dashboard');
                    } else {
                        return redirect()->route('home');
                    }
                }
            };
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // register user
        Fortify::registerView(function () {
            return view('user.register');
        });

        // login user
        Fortify::loginView(function () {
            return view('user.login');
        });

        // verify email
        Fortify::verifyEmailView(function () {
            return view('user.verify-email');
        });

        Event::listen(Verified::class, function ($event) {
            $user = $event->user;
            if ($user->role === 'wisatawan') {
                return redirect()->route('welcome');
            } elseif ($user->role === 'perusahaan') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('home');
            }
        });
    }
}
