@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <i class="fa fa-dashboard"></i><li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.index')}}">Planos</a></li>
    </ol>

    <h1>Planos <a href="{{route('plans.create')}}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.search')}}" class="form form-inline" method="POST">
            @csrf
                <input type="text" value="@if(isset($filters)) {{$filters['filter']}} @endif" name="filter" class="form-control" placeholder="Nome">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width="200"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <td>{{$plan->name}}</td>
                            <td>R$ {{number_format($plan->price, 2, ',', '.')}}</td>
                            <td>
                                <a href="{{route('plans.edit', $plan->url)}}" class="btn btn-warning">Edid</a>
                                <a href="{{route('plans.show', $plan->url)}}" class="btn btn-primary">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div>
        <div class="card-footer">
        @if(isset($filters))
            {!! $plans->appends($filters)->links() !!}
        @else 
            {!! $plans->links() !!}
        @endif
        </div>
    </div>
@stop