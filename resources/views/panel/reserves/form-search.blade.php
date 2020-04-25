<div class="form-search">
    <!-- <form class="form form-inline">
            <input type="text" name="nome" placeholder="Nome:" class="form-control">
            <input type="text" name="email" placeholder="E-mail:" class="form-control"> -->
    {!! Form::open(['route' => 'reserves.search', 'class' => 'form form-inline']) !!}
    {!! Form::text('user', null, ['class' => 'form-control', 'placeholder' => 'Detalhes do usuário']) !!}
    {!! Form::text('reserve', null, ['class' => 'form-control', 'placeholder' => 'Detalhes da reserva']) !!}
    {!! Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Data do voo']) !!}
    {!! Form::select('status',[
    'reserved' => 'Reservado',
    'canceled' => 'Cancelado',
    'paid' => 'Pago',
    'concluded' => 'Concluído',
    ], null, ['class' => 'form-control']) !!}
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