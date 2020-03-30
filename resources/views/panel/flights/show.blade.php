@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home > </a>
    <a href="{{route('flights.index')}}" class="bred">Voos > </a>
    <a href="" class="bred">{{$flight->id}}</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Detalhes do voo: {{$flight->id}}</h1>
</div>

<div class="content-din">
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

    @include('panel.includes.alerts')

    {!! Form::open(['route' => ['flights.destroy', $flight->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
    <div class="form-group">
        <button class="btn btn-danger">Deletar o voo {{$flight->id}}</button>
    </div>
    {!! Form::close() !!}

</div>
<!--Content Dinâmico-->

@endsection