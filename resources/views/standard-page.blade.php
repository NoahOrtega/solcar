@extends('master')
@section('title')
    {{$title}} | Solcar Electric, Inc.
@endsection
@section('description', $description)
@section('headmaster')
    <link href="/build/css/standard-page.css" rel="stylesheet">
    @yield('head')
@endsection
@section('contentmaster')
<div class="page-content-wrapper">
    <div class="page-title-header" style="background-image: url('/images/assets/transparent-circuitry.png');">
        <h1 class="page-title">{{$title ?? 'Solcar'}}</h1>
    </div>
    <div class="page-contents">
        @yield('content')
    </div>
</div>
@endsection
