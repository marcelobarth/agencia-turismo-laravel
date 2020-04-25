@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home > </a>
    <a href="{{route('reserves.index')}}" class="bred">Reservas > </a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Reservas</h1>
</div>

<div class="content-din bg-white">

    <div class="form-search">
        <!-- <form class="form form-inline">
            <input type="text" name="nome" placeholder="Nome:" class="form-control">
            <input type="text" name="email" placeholder="E-mail:" class="form-control"> -->
        {!! Form::open(['route' => 'reserves.search', 'class' => 'form form-inline']) !!}
        {!! Form::text('user', null, ['class' => 'form-control', 'placeholder' => 'Detalhes do usuário']) !!}
        {!! Form::text('reserve', null, ['class' => 'form-control', 'placeholder' => 'Detalhes da reserva']) !!}
        {!! Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Data do voo']) !!}
        <button class="btn btn-search">Pesquisar</button>
        <!-- </form> -->
        {!! Form::close() !!}

        @if(isset($dataForm['key_search']))
        <div class="alert alert-info">
            <p>
                <a href="{{route('planes.index')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                Resultados para: <strong>{{$dataForm['key_search']}}</strong>
            </p>
        </div>
        @endif
    </div>

    <div class="messages">
        @include('panel.includes.alerts')
    </div>

    <div class="class-btn-insert">
        <a href="{{route('reserves.create')}}" class="btn-insert">
            <span class="glyphicon glyphicon-plus"></span>
            Fazer Nova Reserva
        </a>
    </div>

    <table class="table table-striped">
        <tr>
            <th>#id</th>
            <th>Usuário</th>
            <th>Voo</th>
            <th>Status</th>
            <th width="150">Ações</th>
        </tr>

        @forelse($reserves as $reserve)
        <tr>
            <td>{{$reserve->id}}</td>
            <td>{{$reserve->user_name}}</td>
            <td>{{$reserve->flight_id}} ( {{formatDateAndTime($reserve->flight_date)}} )</td>
            <td>{{$reserve->status($reserve->status)}}</td>
            <td>
                <a href="{{route('reserves.edit', $reserve->id)}}" class="edit">Edit</a>
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
    {!! $reserves->appends($dataForm)->links() !!}
    @else
    {!! $reserves->links() !!}
    @endif

</div>
<!--Content Dinâmico-->

@endsection()