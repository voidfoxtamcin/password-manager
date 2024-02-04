@extends('templates.base')

@section('konten')

<div class="min-h-screen bg-blue-50 flex justify-center items-center">

    <div class="p-4 shadow bg-white border max-w-2xl w-full">
        <h1 class="text-4xl font-bold text-center">Register</h1>

        @if ($errors->any())
        <div class="px-3 py-2 bg-red-100 block my-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li class="text-red-600">{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <hr class="border my-4">

        <form action="{{route('proses-register')}}" method="post" class="flex flex-col gap-y-6">
            @csrf
            <div class="grid gap-y-2">
                <label for="fname">{{__('validation.attributes.fname')}}</label>
                <input type="text" name="fname" id="fname" class="px-3 py-2 w-full border">
            </div>
            <div class="grid gap-y-2">
                <label for="email">{{__('validation.attributes.email')}}</label>
                <input type="email" name="email" id="email" class="px-3 py-2 w-full border">
            </div>
            <div class="grid gap-y-2">
                <label for="password">{{__('validation.attributes.password')}}</label>
                <input type="password" name="password" id="password" class="px-3 py-2 w-full border">
            </div>
            <div class="grid gap-y-2">
                <label for="uulangi_password">{{__('validation.attributes.ulangi_password')}}</label>
                <input type="password" name="ulangi_password" id="ulangi_password" class="px-3 py-2 w-full border">
            </div>
            <button type="submit" class="px-3 py-2 bg-blue-500 text-white">Register</button>
        </form>
    </div>

</div>

@endsection