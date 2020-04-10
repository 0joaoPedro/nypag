<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    protected $fillable = [
        'user_id', 'credit_card_holder', 'card_token', 'deleted_at'
    ];

    protected $hidden = [
        'card_token'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createCustom($data)
    {
        return self::create($data);
    }
    public static function updateCustom($id, $data)
    {
        return self::find($id)->update($data);
    }
}
