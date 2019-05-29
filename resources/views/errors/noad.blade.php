@extends('errors.layout')

@section('title', __('No Ad!'))

@section('message', __('messages.missedAd'))

@section('help')
    {!!__('messages.noad')!!}
@endsection