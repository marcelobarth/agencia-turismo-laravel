@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{route('panel')}}" class="bred">Home > </a>
    <a href="{{route('brands.index')}}" class="bred">Marcas > </a>
    <a href="" class="bred">Gestão</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Gestão de Aviões</h1>
</div>

<div class="content-din">

    @if(isset($errors) && $errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(isset($brand))
    <form class="form form-search form-ds" action="{{route('brands.update', $brand->id)}}" method="post">
        {!! method_field('PUT') !!}
        @else
        <form class="form form-search form-ds" action="{{route('brands.store')}}" method="POST">
            @endif
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="text" value="{{old('name')}}" name="name" placeholder="Nome:" class="form-control">
            </div>

            <div class="form-group">
                <button class="btn btn-search">Enviar</button>
            </div>
        </form>

</div>
<!--Content Dinâmico-->

@endsection()