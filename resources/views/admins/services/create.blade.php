@extends('admins.layouts.index1')
@section('content_header')
    <h1>Create Service</h1>
@stop
@section('content')

    {!! Form::open(['url'=>'admins/services']) !!}
    @include('partials.forms.services')
    {!! Form::close() !!}
@stop
