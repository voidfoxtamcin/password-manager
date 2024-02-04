@extends('templates.base')

@section('konten')
@include('templates.navbar')

<div class="jumbotron">
    <div class="container mx-auto">
        <h1 class="text-white text-4xl font-semibold">{{__('public.myProfile')}}</h1>
    </div>
</div>

@endsection