<?php

namespace Zeropingheroes\Lanyard\Http\Controllers;

use Illuminate\Auth\AuthenticationException;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Zeropingheroes\Lanyard\User;

/**
 * Class AuthController
 * @package Zeropingheroes\Lanyard\Http\Controllers\Auth
 */
class AuthController extends Controller
{

    /**
     * Show the login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Redirect the user to the external authentication provider.
     *
     * @param $OAuthProvider string
     * @return Response
     * @throws AuthenticationException
     */
    public function redirectToProvider($OAuthProvider)
    {
        if ($OAuthProvider == 'steam') {
            return Socialite::with('steam')->redirect();
        }

        throw new AuthenticationException(lang('phrase.provider-not-supported', ['provider' => $OAuthProvider]));
    }

    /**
     * Obtain the user information from the external authentication provider.
     *
     * @param $OAuthProvider
     * @return Response
     * @throws AuthenticationException
     */
    public function handleProviderCallback($OAuthProvider)
    {
        if ($OAuthProvider == 'steam') {
            $OAuthUser = Socialite::with('steam')->user();

            $user = $this->findOrCreateUser($OAuthUser, 'steam');
            Auth::login($user, true);

            if (!$user->full_name OR !$user->email) {

                $alerts = [
                    ['message' => lang('phrase.profile-update-required'), 'type' => 'info']
                ];

                return redirect()
                    ->route('user.edit', $user->id)
                    ->with('alerts', $alerts);
            }
            return redirect('/');
        }

        throw new AuthenticationException(lang('phrase.provider-not-supported', ['provider' => $OAuthProvider]));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * If a user has registered before using OAuth, return the user
     * else, create a new user object.
     * @param  $OAuthUser Socialite user object
     * @param $OAuthProvider OAuth provider
     * @return  User
     */
    public function findOrCreateUser($OAuthUser, $OAuthProvider)
    {
        $user = User::where('provider_id', $OAuthUser->id)->first();
        if ($user) {

            if ($OAuthProvider == 'steam') {
                // Update username
                $user->username = $OAuthUser->nickname;
            }
            return $user;
        }
        return User::firstOrCreate([
            'full_name' => $OAuthUser->name,
            'username' => $OAuthUser->nickname,
            'email' => $OAuthUser->email,
            'provider' => $OAuthProvider,
            'provider_id' => $OAuthUser->id
        ]);
    }
}
