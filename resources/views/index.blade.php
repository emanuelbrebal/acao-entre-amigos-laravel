@extends('layouts.app')
@section('title', 'Home Page - Ação Entre Amigos')
<link rel="stylesheet" href="{{ asset('css/landingPage.css') }}">
@section('content')

    @include('landingPage/beneficios')

@endsection
