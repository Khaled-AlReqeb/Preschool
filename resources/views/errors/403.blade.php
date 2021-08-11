@extends('errors.minimal')

@section('title', admin('Forbidden'))
@section('code', '403')
@section('message', admin($exception->getMessage() ?: 'Forbidden'))
