<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewCompany;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    if (strpos(request()->path(), 'company') === 0) {
      config(['fortify.domain' => config('app.url') . '/company']);
      config(['fortify.guard' => 'company']);
      config(['fortify.passwords' => 'companies']);
      config(['fortify.home' => '/company/home']);
    }
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    if (strpos(request()->path(), 'company') === 0) {
      // Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
      Fortify::createUsersUsing(CreateNewCompany::class);
    } else {
      Fortify::createUsersUsing(CreateNewUser::class);
    }
    // Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
    Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
    Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

    Fortify::registerView(function () {
      if (strpos(request()->path(), 'company') === 0) {
        return view('company.auth.register');
      }
      return view('auth.register');
    });

    Fortify::loginView(function () {
      if (strpos(request()->path(), 'company') === 0) {
        return view('company.auth.login');
      }
      return view('auth.login');
    });

    Fortify::requestPasswordResetLinkView(function () {
      if (strpos(request()->path(), 'company') === 0) {
        return view('company.auth.passwords.email');
      }
      return view('auth.passwords.email');
    });

    Fortify::resetPasswordView(function () {
      $token = request()->route()->parameter('token');

      if (strpos(request()->path(), 'company') === 0) {
        return view('company.auth.passwords.reset', ['token' => $token, 'email' => request()->email]);
      }
      return view('auth.passwords.reset', ['token' => $token, 'email' => request()->email]);
    });

    Fortify::verifyEmailView(function () {
      if (strpos(request()->path(), 'company') === 0) {
        return view('company.auth.verify');
      }
      return view('auth.verify');
    });

    Fortify::confirmPasswordView(function () {
      if (strpos(request()->path(), 'company') === 0) {
        return view('company.auth.passwords.confirm');
      }
      return view('auth.passwords.confirm');
    });
  }
}
