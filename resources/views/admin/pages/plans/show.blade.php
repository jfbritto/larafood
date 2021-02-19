@extends('adminlte::page')

@section('title', 'Detalhes do plano')

@section('content_header')
    <h1>Detalhes do plano - <b>{{$plan->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" disabled name="name" class="form-control" value="{{$plan->name}}">
            </div>
            <div class="form-group">
                <label for="url">Url:</label>
                <input type="text" disabled name="url" class="form-control" value="{{$plan->url}}">
            </div>
            <div class="form-group">
                <label for="price">Preço:</label>
                <input type="text" disabled name="price" class="form-control" value="R$ {{number_format($plan->price, 2, ',', '.')}}">
            </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <input type="text" disabled name="description" class="form-control" value="{{$plan->description}}">
            </div>

            <form action="{{route('plans.destroy', $plan->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar: {{$plan->name}}</button>
            </form>
        </div>
    </div>
@stop