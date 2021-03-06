@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home > </a>
    <a href="{{route('state.index')}}" class="bred">Estados > </a>
    <a href="{{route('state.cities', $state->id)}}" class="bred">{{$state->name}} </a>
    <a href="" class="bred">Cidades > </a>
</div>

<div class="title-pg">
    <h1 class="title-pg">({{$cities->count()}} de {{$cities->total()}}) Cidades do Estado: <strong>{{$state->name}}</strong></h1>
</div>

<div class="content-din bg-white">

    <div class="form-search">
        <!-- <form class="form form-inline">
            <input type="text" name="nome" placeholder="Nome:" class="form-control">
            <input type="text" name="email" placeholder="E-mail:" class="form-control"> -->
        {!! Form::open(['route' => ['state.cities.search', $state->initials], 'class' => 'form form-inline']) !!}
        <!-- {!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'Digite uma palavra chave']) !!} -->
        <button class="btn btn-search">Pesquisar</button>
        <!-- </form> -->
        {!! Form::close() !!}

        <!-- @if(isset($dataForm['key_search']))
        <div class="alert alert-info">
            <p>
                <a href=""><i class="fa fa-refresh" aria-hidden="true"></i></a>
                Resultados para: <strong>{{$dataForm['key_search']}}</strong>
            </p>
        </div>
        @endif -->
    </div>

    <div class="messages">
        @include('panel.includes.alerts')
    </div>

    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th width="200">Ações</th>
        </tr>

        @forelse($cities as $city)
        <tr>
            <td>{{$city->name}}</td>
            <td>
                <a href="{{route('airports.index', $city->id)}}" class="edit">
                    <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                    Aeroportos
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="200">Nenhum item cadastrado</td>
        </tr>
        @endforelse
    </table>

    <!--Paginação-->
    @if(isset($dataForm))
    {!! $cities->appends($dataForm)->links() !!}
    @else
    {!! $cities->links() !!}
    @endif

</div>
<!--Content Dinâmico-->

@endsection()