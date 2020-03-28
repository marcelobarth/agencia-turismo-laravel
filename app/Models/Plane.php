<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{

    protected $fillable = ['brand_id', 'qty_passengers', 'class'];

    public function classes($className = null)
    {
        $classes =  [
            '' => 'Escolha uma classe',
            'economic' => 'Economica',
            'luxury' => 'Luxo',
        ];

        if (!$className) {
            return $classes;
        }

        return $classes[$className];
    }

    /** Relacionamneto de muitos pra um */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
