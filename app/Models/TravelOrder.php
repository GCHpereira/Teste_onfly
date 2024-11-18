<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'requester_name',
        'destination',
        'departure_date',
        'return_date',
        'status'
    ];

    /**
     * Relaciona cada pedido de viagem pertencente a um usuário.
     */
    public function user()
    {

      return $this->belongsTo(user::class);

    }

}
