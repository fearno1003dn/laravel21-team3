@extends('admins.layouts.index1')
@section('content_header')
    <h1>Edit {{$roomType->name}} Room Type</h1>
@stop
@section('content')
    {!! Form::model($roomType,['url'=>'admins/roomTypes/'.$roomType->id,'files' => true,'method'=>'put','class' => 'form-horizontal']) !!}
    @include('partials.forms.roomTypes')
    {!! Form::close() !!}
@stop
