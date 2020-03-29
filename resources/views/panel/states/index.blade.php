@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home > </a>
    <a href="" class="bred">Estados > </a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Estados</h1>
</div>

<div class="content-din bg-white">

    <div class="form-search">
        <!-- <form class="form form-inline">
            <input type="text" name="nome" placeholder="Nome:" class="form-control">
            <input type="text" name="email" placeholder="E-mail:" class="form-control"> -->
        {!! Form::open(['route' => 'states.search', 'class' => 'form form-inline']) !!}
        {!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'Digite uma palavra chave']) !!}
        <button class="btn btn-search">Pesquisar</button>
        <!-- </form> -->
        {!! Form::close() !!}

        @if(isset($dataForm['key_search']))
        <div class="alert alert-info">
            <p>
                <a href="{{route('states.index')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                Resultados para: <strong>{{$dataForm['key_search']}}</strong>
            </p>
        </div>
        @endif
    </div>

    <div class="messages">
        @include('panel.includes.alerts')
    </div>

    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>Sigla</th>
            <th width="200">Ações</th>
        </tr>

        @forelse($states as $state)
        <tr>
            <td>{{$state->name}}</td>
            <td>{{$state->initials}}</td>
            <td>
                <!-- <a href="{{route('states.edit', $state->id)}}" class="edit">Edit</a> -->
                #ações
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="200">Nenhum item cadastrado</td>
        </tr>
        @endforelse
    </table>

</div>
<!--Content Dinâmico-->

@endsection()