@extends('admins.layouts.index1')
@section('content_header')
    <h1>Edit {!!$user->first_name!!} {!!$user->last_name!!} user</h1>
@stop
@section('content')
    {!! Form::model($user,['url'=>'admins/users/'.$user->id.'/update','method'=>'put','class' => 'form-horizontal']) !!}
    @include('partials.forms.editUser')
    {!! Form::close() !!}
@stop
