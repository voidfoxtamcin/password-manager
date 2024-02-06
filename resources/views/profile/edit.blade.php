@extends('templates.base')

@section('konten')
@include('templates.navbar')

<div class="jumbotron">
    <div class="container mx-auto">
        <h1 class="text-white text-4xl font-semibold">Edit {{__('public.myProfile')}}</h1>
    </div>
</div>

<div class="px-4 py-12">
    <div class="max-w-2xl w-full mx-auto">
        @if ($errors->any())
        <div class="alert alert-red my-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li class="text-red-600">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('profile.ubah_profile')}}" method="post" class="flex flex-col gap-y-6">
            @csrf
            <div class="flex flex-col gap-y-2">
                <label for="fname" class="label">{{__('validation.attributes.fname')}}</label>
                <input type="text" name="fname" id="fname" class="input" value="{{$user->name}}">
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="email" class="label">{{__('validation.attributes.email')}}</label>
                <input type="email" name="email" id="email" class="input" value="{{$user->email}}">
            </div>
            <button type="submit" class="button button-green">{{__('public.change')}}</button>
        </form>
    </div>
</div>

@endsection