<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;

class CityController extends Controller
{
    private $totalPage = 20;

    public function index($initials)
    {
        $state = State::where('initials', $initials)->get()->first();

        if (!$state) {
            return redirect()->back();
        }

        $cities = $state->cities()->paginate($this->totalPage);

        $title = "Cidades do Estado {$state->name}";

        return view('panel.cities.index', compact('title', 'state', 'cities'));
    }
}
