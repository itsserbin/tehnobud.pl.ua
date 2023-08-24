@extends('layout')

@section('content')
    @include('home.home', ['buildings' => $buildings, 'citiesSelect' => $citiesSelect])
@endsection
