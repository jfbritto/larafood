@extends('adminlte::page')

@section('title', 'Editar plano')

@section('content_header')
    <h1>Editar plano - <b>{{$plan->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{route('plans.update', $plan->url)}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.plans._partials.form')
                
            </form>
        </div>
    </div>
@stop