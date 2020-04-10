<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
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
        $this->middleware('guest')->except('logout');
    }
    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'cnpj_cpf';
    }

    protected function credentials(Request $request)
    {
        $request['cnpj_cpf'] = preg_replace('/[^0-9]/', '', $request['cnpj_cpf']);
        $request->merge(["cnpj_cpf" => $request->cnpj_cpf]);
        $credentials = $request->only("cnpj_cpf", "password");
        $credentials["deleted_at"] = null;
        return $credentials;
    }
}
