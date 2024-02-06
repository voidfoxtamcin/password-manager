@extends('templates.base')

@section('konten')
@include('templates.navbar')

<div class="jumbotron">
    <div class="container mx-auto">
        <h1 class="text-white text-4xl font-semibold">{{__('public.myProfile')}}</h1>
    </div>
</div>

<div class="px-4 py-12">
    <div class="container mx-auto">

        @if (session()->has('success'))
        <div class="alert alert-green">
            {{ session('success') }}
        </div>
        @endif

        <div class="flex flex-col divide-y-2">
            <div class="p-4">
                <p class="font-normal text-lg">{{__('public.name')}}</p>
                <p class="font-medium text-3xl">{{$user->name}}</p>
            </div>
            <div class="p-4">
                <p class="font-normal text-lg">{{__('public.emailRegistered')}}</p>
                <p class="font-medium text-3xl">{{$user->email}}</p>
            </div>
            <div class="p-4">
                <p class="font-normal text-lg">{{__('public.joinedAt')}}</p>
                <p class="font-medium text-3xl">{{date_format($user->created_at, 'd M Y')}}</p>
            </div>
        </div>
        <div class="flex mt-6 gap-x-4">
            <a href="{{route('profile.ubah_password_view')}}" class="button button-blue"><i class="fa fa-fw fa-lock"></i> {{__('public.changePassword')}}</a>
            <a href="{{route('profile.ubah_profile_view')}}" class="button button-blue"><i class="fa fa-fw fa-user-pen"></i> {{__('public.editProfile')}}</a>
        </div>
    </div>
</div>
@endsection