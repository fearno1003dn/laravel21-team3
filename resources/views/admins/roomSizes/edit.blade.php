@extends('admins.layouts.index1')
@section('content_header')
    <h1>Edit {{$roomSize->name}} Room Size</h1>
@stop
@section('content')
    {!! Form::model($roomSize,['url'=>'admins/roomSizes/'.$roomSize->id,'method'=>'put','class' => 'form-horizontal']) !!}
        @include('partials.forms.roomSizes')
    {!! Form::close() !!}
@stop
