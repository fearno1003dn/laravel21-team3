@extends('admins.layouts.index1')
@section('content_header')
    <h1>Create Room Size</h1>
@stop
@section('content')

    {!! Form::open(['url'=>'admins/roomSizes','class' => 'form-horizontal' ])!!}
        @include('partials.forms.roomSizes')
    {!! Form::close() !!}
@stop
