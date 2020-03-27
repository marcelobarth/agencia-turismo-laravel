<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    public function classes()
    {
        return [
            '' => 'Escolha uma classe',
            'economic' => 'Economica',
            'luxury' => 'Luxo',
        ];
    }
}
