@extends('templates.base')

@section('konten')

@include('templates.navbar')

<div class="px-4 py-24 bg-blue-500">
    <div class="container mx-auto">
        <h1 class="text-white text-4xl font-semibold">{{__('public.editPassword')}}</h1>
    </div>
</div>

<div class="px-4 py-12">
    <div class="max-w-2xl w-full mx-auto">
        @if ($errors->any())
        <div class="alert alert-red mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li class="text-red-700">{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('admin.edit.post', ['id' => $password->id])}}" method="post" class="flex flex-col gap-y-6">
            @csrf
            <div class="flex flex-col gap-y-2">
                <label for="nama_password" class="label">{{__('public.accountName')}}</label>
                <input type="text" name="nama_password" id="nama_password" class="input" value="{{$password->nama_password}}">
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="deskripsi_password" class="label">{{__('public.description')}}</label>
                <textarea name="deskripsi_password" id="deskripsi_password" cols="30" rows="5" class="input">{{$password->deskripsi_password}}</textarea>
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="username" class="label">Username</label>
                <input type="text" name="username" id="username" class="input" value="{{$password->username}}">
            </div>
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
            <button type="submit" class="button button-blue">Submit</button>
        </form>
    </div>
</div>
@endsection