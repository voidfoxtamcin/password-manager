@extends('templates.base')

@section('konten')

@include('templates.navbar')

<div class="jumbotron">
    <div class="container mx-auto">
        <h1 class="text-white text-4xl font-semibold">@lang('public.addNewPassword')</h1>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-red my-4">
    <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
        <li class="text-red-600">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="px-4 py-12">
    <div class="max-w-2xl w-full mx-auto">
        <form action="{{route('admin.tambah.post')}}" method="post" class="flex flex-col gap-y-6">
            @csrf
            <div class="flex flex-col gap-y-2">
                <label for="nama_password" class="label">@lang('public.accountName')</label>
                <input type="text" name="nama_password" id="nama_password" class="input">
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="deskripsi_password" class="label">@lang('public.description')</label>
                <textarea name="deskripsi_password" id="deskripsi_password" cols="30" rows="5" class="input"></textarea>
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="username" class="label">Username</label>
                <input type="text" name="username" id="username" class="input">
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="password" class="label">Password</label>
                <input type="password" name="password" id="password" class="input">
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="ulangi_password" class="label">@lang('public.repeatPassword')</label>
                <input type="password" name="ulangi_password" id="ulangi_password" class="input">
            </div>
            <button type="submit" class="button button-blue">Submit</button>
        </form>
    </div>
</div>
@endsection