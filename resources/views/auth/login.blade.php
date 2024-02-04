@extends('templates.base')

@section('konten')

    <div class="min-h-screen bg-blue-50 flex justify-center items-center">

        <div class="p-4 shadow bg-white border max-w-2xl w-full">
            <h1 class="text-4xl font-bold text-center">Login</h1>

            @if ($errors->any())
                <div class="alert alert-red my-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="px-3 py-2 bg-red-100 block my-4">
                    <p class="text-red-600">{{ session('error') }}</p>
                </div>
            @endif

            <hr class="border my-4">

            <form action="{{ route('proses-login') }}" method="post" class="flex flex-col gap-y-6">
                @csrf
                <div class="grid gap-y-2">
                    <label for="email" class="label">Email</label>
                    <input type="email" name="email" id="email" class="input">
                </div>
                <div class="grid gap-y-2">
                    <label for="password" class="label">Password</label>
                    <input type="password" name="password" id="password" class="input">
                </div>
                <button type="submit" class="button button-blue">Login</button>
            </form>
        </div>

    </div>

@endsection
