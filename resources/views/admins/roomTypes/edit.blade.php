@extends('admins.layouts.index1')
@section('content_header')
    <h1>Edit "{{$room->name}}" Room</h1>
@stop
@section('content')
    {!! Form::model($room,['url'=>'admins/rooms/'.$room->id,'method'=>'put']) !!}
        @include('partials.forms.roomTypes')
    {!! Form::close() !!}
@stop
