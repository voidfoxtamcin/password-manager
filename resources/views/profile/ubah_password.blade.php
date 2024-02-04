@extends('templates.base')

@section('konten')
@include('templates.navbar')

<div class="jumbotron">
    <div class="container mx-auto">
        <h1 class="text-white text-4xl font-semibold">{{__('public.changePassword')}}</h1>
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

        <form action="{{route('profile.ubah_password')}}" method="post" class="flex flex-col gap-y-6">
            @csrf
            <div class="flex flex-col gap-y-2">
                <label for="password_lama" class="label">{{__('public.oldPassword')}}</label>
                <input type="password" name="password_lama" id="password_lama" class="input">
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="password_baru" class="label">{{__('public.newPassword')}}</label>
                <input type="password" name="password_baru" id="password_baru" class="input">
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="ulangi_password" class="label">{{__('public.repeatPassword')}}</label>
                <input type="password" name="ulangi_password" id="ulangi_password" class="input">
            </div>
            <button type="submit" class="button button-green">{{__('public.change')}}</button>
        </form>
    </div>
</div>

@endsection