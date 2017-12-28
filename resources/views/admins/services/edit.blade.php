@extends('admins.layouts.index1')
@section('content_header')
    <h1>Edit {{$service->name}} service</h1>
@stop
@section('content')
    {!! Form::model($service,['url'=>'admins/services/'.$service->id,'method'=>'put','class' => 'form-horizontal']) !!}
    @include('partials.forms.services')
    {!! Form::close() !!}
@stop
