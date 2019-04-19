@extends('errors.layout')

@section('title', __('No Ad!'))

@section('message', __('Sorry, but you missed this great opportunity!'))

@section('help')
{!!__('messages.noad')!!}
@endsection