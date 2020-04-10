<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentOrder extends Model
{
    protected $fillable = [
        'user_id', 'ordem_id', 'payment_id', 'descricao', 'valor', 'valor_transacao', 'boleto', 'forma', 'status','sended_at','deleted_at'
    ];

    public static function createCustom($data)
    {
        return self::create($data);
    }
}
