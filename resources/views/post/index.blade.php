@extends('layouts.master')

@section('title') Posts Form @stop

@section('headAssets')
    <style>

    </style>
@stop
@section('pageContent')
    @if($message)
        <h1>{{$message}}</h1>
    @endif
    All posts will be here {{$posts}}
@stop

@section('footerAssets')@stop