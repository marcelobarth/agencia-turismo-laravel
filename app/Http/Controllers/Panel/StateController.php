<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;

class StateController extends Controller
{
    private $state;

    public function __construct(State $state)
    {
        $this->state = $state;
    }

    public function index()
    {
        $states = $this->state->get();

        $title = "Exibição dos estados brasileiros";

        return view('panel.states.index', compact('title', 'states'));
    }

    public function search(Request $request)
    {
        $keySearch = $request->key_search;

        $title = "Resultados de estado: {$keySearch}";

        $states = $this->state->search($keySearch); //Esse método searchCities está implementado na model

        return view('panel.states.index', compact('title', 'states'));
    }
}
