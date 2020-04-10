<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cnpj_cpf', 'name',  'email', 'phone_number', 'password', 'has_vindi_account', 'vindi_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'verified',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasVerifiedPhone()
    {
        return (bool)$this->verified;
    }

    public function markPhoneAsVerified()
    {
        return $this->forceFill([
            'verified' => true,
        ])->save();
    }

    public function hasVindiAccount()
    {
        return ($this->has_vindi_account === 0) ? false : true;
    }
}
