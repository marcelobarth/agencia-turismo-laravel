<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;

class CityController extends Controller
{
    public function index($initials)
    {
        $state = State::where('initials', $initials)->get()->first();

        if (!$state) {
            return redirect()->back();
        }

        $title = "Cidades do estado {$state->name}";

        return view('panel.cities.index', compact('title'));
    }
}
