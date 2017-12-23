@extends('admins.layouts.index1')
@section('content_header')
    <h1>Edit {{$service->service_name}} service</h1>
@stop
@section('content')
    {!! Form::model($service,['url'=>'admins/services','method'=>'put']) !!}
    @include('partials.forms.services')
    {!! Form::close() !!}
@stop
