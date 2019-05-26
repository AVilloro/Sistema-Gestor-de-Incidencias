<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Project;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function authenticated()
    {
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
        }
    }
}
