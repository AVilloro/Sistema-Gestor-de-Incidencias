<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Project;
use Socialite;
use App\User;

class AuthController extends Controller
{

    protected $redirectTo = '/home';

  public function redirectToProvider($provider)
  {
      return Socialite::driver($provider)->redirect();
  }


  public function handleProviderCallback($provider)
  {

    $user = Socialite::driver($provider)->user();

    $existingUser = User::where('email', $user->getEmail())->first();

    if ($existingUser) {
        auth()->login($existingUser, true);
        return redirect($this->redirectTo);
      }else{

      $authUser = $this->findOrCreateUser($user, $provider);

      Auth::login($authUser, true);

      $user = auth()->user();

      if (! $user->selected_project_id) {
          if ($user->is_admin || $user->is_client) {
              $user->selected_project_id = Project::first()->id;

          } else { // is_support
              $first_project = $user->projects->first();

              if ($first_project)
                  $user->selected_project_id = $first_project->id;
          }

          $user->save();

      return redirect($this->redirectTo);
    }
  }
}

  public function findOrCreateUser($user, $provider)
  {
      $authUser = User::where('provider_id', $user->id)->first();
      if ($authUser) {
          return $authUser;
      }
      return User::create([
          'name'     => $user->name,
          'email'    => $user->email,
          'provider' => $provider,
          'provider_id' => $user->id
      ]);
  }
}
