<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\City;

class AirportController extends Controller
{
    private $airport, $city, $totalPage = 10;

    public function __construct(City $city, Airport $airport)
    {
        $this->city = $city;
        $this->airport = $airport;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idCity)
    {
        $city = $this->city->find($idCity);

        if (!$city)
            return redirect()->back();

        $title = "Aeroportos da cidade {$city->name}";

        $airports = $city->airports()->paginate($this->totalPage);

        return view('panel.airports.index', compact('city', 'title', 'airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idCity)
    {
        $city = $this->city->find($idCity);

        if (!$city)
            return redirect()->back();

        $title = "Cadastrar novo aeroporto na cidade {$city->name}";

        $cities = $this->city->pluck('name', 'id');

        return view('panel.airports.create', compact('title', 'city', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idCity)
    {
        $city = $this->city->find($idCity);

        if (!$city)
            return redirect()->back();

        if ($this->airport->create($request->all()))
            return redirect()
                ->route('airports.index', $request->city_id)
                ->with('success', 'Aeroporto cadastrado com sucesso');

        return redirect()
            ->back()
            ->with('error', 'Falha ao cadastrar aeroporto')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idCity, $id)
    {
        $airport = $this->airport->with('city')->find($id);

        if (!$airport)
            return redirect()->back();

        $city = $airport->city;

        $title = "Aeroporto {$airport->name} - {$city->name}";

        return view('panel.airports.show', compact('airport', 'title', 'city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idCity, $id)
    {
        $airport = $this->airport->with('city')->find($id);

        if (!$airport)
            return redirect()->back();

        $city = $airport->city;

        $cities = $this->city->pluck('name', 'id');

        $title = "Editar Aeroporto {$airport->name}";

        return view('panel.airports.edit', compact('airport', 'title', 'city', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idCity, $id)
    {
        $airport = $this->airport->find($id);

        if (!$airport)
            return redirect()->back();

        if ($airport->update($request->all()))
            return redirect()
                ->route('airports.index', $idCity)
                ->with('success', 'Aeroporto atualizado com sucesso');

        return redirect()
            ->back()
            ->with('error', 'Falha ao atualizar aeroporto')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCity, $id)
    {
        $airport = $this->airport->find($id);

        if (!$airport)
            return redirect()->back();

        if ($airport->delete())
            return redirect()
                ->route('airports.index', $idCity)
                ->with('success', 'Aeroporto deletado com sucesso');

        return redirect()
            ->back()
            ->with('error', 'Falha ao deletar aeroporto')
            ->withInput();
    }
}
