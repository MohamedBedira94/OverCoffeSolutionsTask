<?php

namespace App\Http\Controllers;

use App\SocialAccountService;
use Illuminate\Http\Request;

use App\Http\Requests;

use Laravel\Socialite\Facades\Socialite;

class AuthSocController extends Controller
{
	/**
	 * Redirect the user to the GitHub authentication page.
	 *
	 * @return Response
	 */
	public function redirectToProvider()
	{
		return Socialite::driver('facebook')->redirect();
	}

	/**
	 * Obtain the user information from GitHub.
	 *
	 * @return Response
	 */
	public function handleProviderCallback(SocialAccountService $service)
	{
		/*$user = Socialite::driver('facebook')->user();
		dd($user);
		// $user->token;
		*/
		$user = $service->createOrGetUser(Socialite::driver('facebook')->user());

		auth()->login($user);

		return redirect()->to('/home');
	}
}
