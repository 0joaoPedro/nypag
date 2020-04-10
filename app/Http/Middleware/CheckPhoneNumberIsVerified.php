<?php

namespace App\Http\Middleware;

use Illuminate\Support\MessageBag;
use Closure;
use Auth;

class CheckPhoneNumberIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Verifica se está logado, se não tiver redireciona
        if (!auth()->check())
            return redirect()->route('login');
        // Recupera o campo verified(que identifica se foi verifica 1 para true) do usuário logado
        if (Auth::user()->verified != true)
        {
            $messages = new MessageBag();
            $messages->add('verified', "Efetue a confirmação do seu número!");
            return redirect('/verify')->with('messages', $messages);
        }
        // Permite que continue (Caso não entre em nenhum dos if acima)...
        return $next($request);
    }
}
