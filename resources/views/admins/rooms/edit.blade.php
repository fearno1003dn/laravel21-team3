@extends('admins.layouts.index1')
@section('content_header')
    <h1>Edit "{{$room->name}}" Room</h1>
@stop
@section('content')
    {!! Form::model($room,['url'=>'admins/rooms/'.$room->id,'files' => true,'enctype' => 'multipart/form-data','method'=>'put']) !!}
        @include('partials.forms.rooms')
    {!! Form::close() !!}
@stop
