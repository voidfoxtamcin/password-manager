<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Password Manager</title>
</head>

<body>

    <div class="min-h-screen grid grid-cols-2">
        <div class="bg-blue-500 flex justify-center items-center">
            <div class="text-white text-center max-w-2xl">
                <p class="text-4xl font-medium">@lang('public.welcomeTo')</p>
                <p class="text-6xl font-bold">Password Manager</p>

                <hr class="border border-white my-8">

                <p class="text-2xl font-medium">@lang('public.appDesc')</p>

                <div class="grid mt-8">

                    @if ($user > 0)
                    <a href="{{ route('login') }}" class="p-4 border text-blue-500 bg-white inline-block font-medium text-2xl">Login!</a>
                    @else
                    <a href="{{ route('register') }}" class="p-4 border text-blue-500 bg-white inline-block font-medium text-2xl">Ayo buat akun
                        dulu!</a>
                    @endif
                </div>

                @auth
                <p>Sudah Login</p>
                @endauth
            </div>
        </div>
        <div class="relative">
            <p class="absolute text-white bottom-5 right-5 z-[1]">Photo by <a href="https://unsplash.com/@kmuza?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash" class="underline">Carlos Muza</a> on <a href="https://unsplash.com/photos/laptop-computer-on-glass-top-table-hpjSkU2UYSU?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash" class="underline">Unsplash</a>
            </p>
            <img src="{{ asset('img/bg1.jpg') }}" class="object-cover w-full h-full" alt="">
        </div>
    </div>

    <!-- <div class="min-h-screen bg-blue-500 flex justify-center items-center">
        <div class="text-white text-center max-w-2xl">
            <p class="text-4xl font-medium">Selamat Datang di</p>
            <p class="text-6xl font-bold">Password Manager</p>

            <hr class="border border-white my-8">

            <p class="text-2xl font-medium">Tempat me-manage password dari puluhan akun yang anda telah buat, sehingga anda tidak kesulitan untuk mengingat seluruh password anda.</p>

            <div class="grid mt-8">
                <a href="{{ route('register') }}" class="p-4 border text-blue-500 bg-white inline-block font-medium text-2xl">Ayo buat akun dulu!</a>
            </div>
        </div>
    </div> -->

    <div class="fixed bottom-10 right-10 bg-blue-400 w-16 h-16 flex justify-center items-center rounded-full cursor-pointer" id="lang-dropdown">
        <i class="fa-solid fa-globe text-white fa-fw fa-2x inline-block"></i>
        <div class="absolute hidden flex-col bg-white border -top-24 w-48 right-0" id="lang-navbar-hidden">
            <a href="{{ route('lang', ['locale' => 'en']) }}" class="px-4 py-2">English</a>
            <a href="{{ route('lang', ['locale' => 'id']) }}" class="px-4 py-2">Bahasa Indonesia</a>
        </div>
    </div>

    <script>
        const langDropdown = document.getElementById('lang-dropdown');
        const langNavbarHidden = document.getElementById('lang-navbar-hidden');
        let isOpen = false;
        langDropdown.addEventListener('click', () => {
            isOpen = !isOpen;

            if (isOpen) {
                langNavbarHidden.classList.remove('hidden');
                langNavbarHidden.classList.add('flex');
            } else {
                langNavbarHidden.classList.remove('flex');
                langNavbarHidden.classList.add('hidden');
            }
        });
    </script>

</body>

</html>