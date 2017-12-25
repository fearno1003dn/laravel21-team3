@extends('admins.layouts.index1')
@section('content_header')
    <h1>Create Room</h1>
@stop
@section('content')

    {!! Form::open(['url'=>'admins/rooms' !!}
        @include('partials.forms.roomTypes')
    {!! Form::close() !!}
@stop
