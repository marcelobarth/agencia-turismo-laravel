<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];

    public function search($keySearch, $totalPage = 3)
    {
        return $this->where('name', 'LIKE', "%{$keySearch}%")->paginate($totalPage);
    }
}
