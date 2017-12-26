@extends('admins.layouts.index1')
@section('content_header')
    <h1>Create Room</h1>
@stop
@section('content')

    {!! Form::open(['url'=>'admins/rooms','files' => true,'enctype' => 'multipart/form-data']) !!}
        @include('partials.forms.rooms')
    {!! Form::close() !!}
@stop
