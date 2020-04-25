<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Carbon\Carbon;

class Flight extends Model
{
    /** Casts valida o tipo de value */
    protected $casts = [
        'is_promotion' => 'boolean',
    ];

    protected $fillable = [
        'plane_id',
        'airport_origin_id',
        'airport_destination_id',
        'date',
        'time_duration',
        'hour_output',
        'arrival_time',
        'old_price',
        'price',
        'total_stops',
        'is_promotion',
        'image',
        'qty_stops',
        'description',
    ];

    public function getItems()
    {
        return $this->with(['origin', 'destination'])
            ->paginate($this->totalPage);
    }

    public function newFlight($request, $nameFile = null)
    {
        /*
        $data = $request->all();
        $data['airport_origin_id'] = $request->origin;
        $data['airport_destination_id'] = $request->destination;
        //dd($data);
        */
        $data = $request->all();
        $data['image'] = $nameFile; //Passa para a posição image do array o arquivo de Upload, se existir

        return $this->create($data);
    }

    public function updateFlight($request, $nameFile = '')
    {
        /*
        $data = $request->all();
        $data['airport_origin_id']          = $request->origin;
        $data['airport_destination_id']     = $request->destination;
        */
        $data = $request->all();
        $data['image'] = $nameFile;

        return $this->update($data);
    }

    public function origin()
    {
        return $this->belongsTo(Airport::class, 'airport_origin_id');
    }

    public function destination()
    {
        return $this->belongsTo(Airport::class, 'airport_destination_id');
    }

    /** Mutator para data. Mas foi substituído com um helper */
    // public function getDateAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d/m/Y');
    // }

    public function search($request, $totalPage)
    {
        return $this->where(function ($query) use ($request) {
            if ($request->code)
                $query->where('id', $request->code);

            if ($request->date)
                $query->where('date', '>=', $request->date);

            if ($request->hour_output)
                $query->where('hour_output', $request->hour_output);

            if ($request->total_stops)
                $query->where('total_stops', $request->total_stops);

            if ($request->origin)
                $query->where('airport_origin_id', $request->origin);

            if ($request->destination)
                $query->where('airport_destination_id', $request->destination);
        })->paginate($totalPage);
        /** Para ver a SQL da consulta montada, use o método toSql() */
        // $flights = $this->where(function ($query) use ($request) {
        //     if ($request->code)
        //         $query->where('id', $request->code);

        //     if ($request->date)
        //         $query->where('date', '>=', $request->date);

        //     if ($request->hour_output)
        //         $query->where('hour_output', $request->hour_output);

        //     if ($request->total_stops)
        //         $query->where('total_stops', $request->total_stops);

        //     if ($request->origin)
        //     $query->where('airport_origin_id', $request->origin);

        // if ($request->destination)
        //     $query->where('airport_destination_id', $request->destination);
        // })->toSql();
        // dd($flights);
        // return $flights;
    }
}
