@extends('site.layouts.app')

@section('content-site')

<div class="content">

    <section class="container">
        <h1 class="title">Detalhes do voô {{$flight->id}}</h1>

        <ul>
            <li>
                Código: <strong>{{$flight->id}}</strong>
            </li>
            <li>
                Origem: <strong>{{$flight->origin->name}}</strong>
            </li>
            <li>
                Destino: <strong>{{$flight->destination->name}}</strong>
            </li>
            <li>
                Data: <strong>{{formatDateAndTime($flight->date)}}</strong>
            </li>
            <li>
                Duração: <strong>{{formatDateAndTime($flight->time_duration, 'H:i')}}</strong>
            </li>
            <li>
                Saída: <strong>{{formatDateAndTime($flight->hour_output, 'H:i')}}</strong>
            </li>
            <li>
                Chegada: <strong>{{formatDateAndTime($flight->arrival_time, 'H:i')}}</strong>
            </li>
            <li>
                Valor Anterior: <strong> R$ {{formatCoin($flight->old_price)}}</strong>
            </li>
            <li>
                Valor Atual: <strong> R$ {{formatCoin($flight->price)}}</strong>
            </li>
            <li>
                Total de Parcelas: <strong>{{$flight->total_plots}}</strong>
            </li>
            <li>
                Promoção: <strong>{{$flight->is_promotion ? 'Sim' : 'Não'}}</strong>
            </li>
            <li>
                Paradas: <strong>{{$flight->qty_stops}}</strong>
            </li>
            <li>
                Descrição: <strong>{{$flight->description}}</strong>
            </li>
        </ul>

    </section>
    <!--Container-->

</div>

@endsection