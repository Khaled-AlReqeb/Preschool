@extends('errors.minimal')

@section('title', admin('Service Unavailable'))
@section('code', '503')
@section('message', admin($exception->getMessage() ?: 'Service Unavailable'))
