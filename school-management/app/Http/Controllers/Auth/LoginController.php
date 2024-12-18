<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating collaborators for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect collaborators after login.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showLoginCollaboratorForm()
    {
        return view('auth.login_collaborator');
    }

    public function loginStudent(Request $request)
    {
        $credentials = $request->validate([
            'matricule' => ['required'],
            'password' => ['required'],
        ]);
        // dd($credentials,$request,Auth::attempt(['matricule' => $request['matricule'], 'password' => $request['password']]));
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
           
            return redirect()->route('user.home');
        }


        return back()->withErrors([
            'matricule' => "les informations d'identification fournies ne correspondent pas à nos dossiers.",
        ]);
    }
    public function loginCollaborator(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('collaborator.home');
        }

        return back()->withErrors([
            'email' => "les informations d'identification fournies ne correspondent pas à nos dossiers.",
        ]);
    }

    /**
     * Log the collaborator out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Handle the logout request
    public function logout(Request $request)
    {
        $user = User::find(auth()->user()->id);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($user->hasRole('Student')) {
            return redirect(RouteServiceProvider::STUDENTLOGOUT);
        }
        return redirect(RouteServiceProvider::COLABORATORLOGOUT);
    }
}
