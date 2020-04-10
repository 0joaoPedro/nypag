<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Verify\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\MessageBag;

use App\Http\Models\PaymentOrder;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify';

    /**
     * Verification service
     *
     * @var Service
     */
    protected $verify;

    /**
     * Create a new controller instance.
     *
     * @param Service $verify
     */
    public function __construct(Service $verify)
    {
        $this->verify = $verify;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['cnpj_cpf'] = preg_replace('/[^0-9]/', '', $data['cnpj_cpf']);
        $data['phone_number'] = $postalcode = '+55'.preg_replace('/[^0-9]/', '', $data['phone_number']);
        return Validator::make($data, [
            'cnpj_cpf'     => ['required', 'string', 'max:20', 'unique:users'],
            'name'         => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'min:10', 'unique:users'],
            'email'        => ['required', 'email', 'unique:users']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['cnpj_cpf'] = preg_replace('/[^0-9]/', '', $data['cnpj_cpf']);
        $data['phone_number'] = '+55'.preg_replace('/[^0-9]/', '', $data['phone_number']);
        $user =  User::create([
            'cnpj_cpf' => $data['cnpj_cpf'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make('123456'),
        ]);
        if(isset($data['boleto'])){
            $order['user_id']   = $user->id;
            $order['boleto']    = $data['boleto'];
            $order['forma']     = $data['multi'];
            $order['valor']     = str_replace(',', '.', str_replace('.', '', $data['valor']));
            $order['valor_transacao']     = str_replace(',', '.', str_replace('.', '', $data['valor_transacao']));
            $order['descricao'] = "Pagamento - Boleto ".$data['boleto'];
            $order['status']    = 1;
            PaymentOrder::createCustom($order);
        }
        
        return $user;
    }

    protected function registered(Request $request, User $user)
    {
        $verification = $this->verify->startVerification($user->phone_number, 'sms');
        if (!$verification->isValid()) {
            $user->delete();
            $errors = new MessageBag();
            foreach($verification->getErrors() as $error) {
                $errors->add('verification', $error);
            }
            return view('auth.register')->withErrors($errors);
        }
        $messages = new MessageBag();
        $messages->add('verification', "[PAGUE TUDO AZUL] - Código enviado para {$request->user()->phone_number}");
        return redirect('/verify')->with('messages', $messages);
    }
}
