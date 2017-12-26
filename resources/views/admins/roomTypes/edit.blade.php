@extends('admins.layouts.index1')
@section('content_header')
    <h1>Edit {{$roomTypes->name}} Room Type</h1>
@stop
@section('content')
    {!! Form::model($roomTypes,['url'=>'admins/roomTypes/'.$roomTypes->id,'method'=>'put']) !!}
        @include('partials.forms.roomTypes')
    {!! Form::close() !!}
@stop
