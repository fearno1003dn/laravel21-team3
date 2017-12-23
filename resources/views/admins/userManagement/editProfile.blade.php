@extends('admins.layouts.index1')
@section('content_header')
    <h1>Edit {{$user->user_name}} user</h1>
@stop
@section('content')
    {!! Form::model($user,['url'=>'admins/users','method'=>'put']) !!}
    @include('partials.forms.editUser')
    {!! Form::close() !!}
@stop
