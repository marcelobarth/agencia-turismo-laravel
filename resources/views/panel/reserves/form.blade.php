<div class="form-group">
    <label for="user_id">Usuário</label>
    {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="flight_id">Voo</label>
    {!! Form::select('flight_id', $flights, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="date">Data Reserva</label>
    {!! Form::date('date', date('Y-m-d'), ['class' => 'form-control', 'placeholder' => 'Data Reserva']) !!}
</div>
<div class="form-group">
    <label for="status">Status</label>
    {!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <button class="btn btn-search">Enviar</button>
</div>