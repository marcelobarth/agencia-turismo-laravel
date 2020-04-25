<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reserve extends Model
{
    protected $fillable = ['user_id', 'flight_id', 'date_reserved', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function status($op = null)
    {
        $statusAvailable = [
            'reserved' => 'Reservado',
            'canceled' => 'Cancelado',
            'paid' => 'Pago',
            'concluded' => 'Concluído',
        ];

        if ($op)
            return $statusAvailable['reserved'];

        return $statusAvailable;
    }
}
