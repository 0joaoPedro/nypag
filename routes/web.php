<?php

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::group(['namespace'=>'Frontend'], function(){
	Route::get('/simulador', 'SimuladorController@simulador')->name('simulador');
});

// Route::middleware(['auth', 'verified', 'check.phone.confirmation'])->group(function () {
	Route::group(['namespace' => 'Cartao','prefix' => 'cartao'], function () {
        Route::get('/', 'CartaoController@index')->name('cartao');
        Route::get('/lista','CartaoController@lista')->name('cartao.lista');
        Route::get('/create', 'CartaoController@create')->name('cartao.create');
        Route::post('/store', 'CartaoController@store')->name('cartao.store');
        Route::delete('/{id}', 'CartaoController@destroy')->name('cartao.delete');
    });

    Route::get('/consulta', 'DebitosController@consulta')->name('debitos.consulta');
    Route::post('/simulador', 'DebitosController@simulador')->name('debitos.simulador');
    Route::post('/checkout', 'DebitosController@checkout')->name('debitos.checkout');
    Route::post('/checkout/pagamento/api/v3/payments', 'DebitosController@pagamento');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/pagamento', 'Payment\PaymentController', ['as' => 'payment']);
    Route::resource('/transacoes', 'Payment\PaymentOrderController');
    Route::get('/transacoes', 'Payment\PaymentOrderController@lista')->name('transacoes.lista');
    Route::resource('/payment', 'Payment\PaymentController', ['as'=>'payment']);
    Route::post('/payment', 'Payment\PaymentOrderController@store')->name('payment.store');

// });

Route::namespace('Auth')->group(function () {
    Route::get('/verify', 'VerificationController@show');
    Route::post('/verify', 'VerificationController@verify');
    Route::post('/resend', 'VerificationController@resend');
    Route::get('/logout', 'LoginController@logout');
});