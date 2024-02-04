<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/output.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{ $title }}</title>
</head>

<body>

    @yield('konten')


    <div class="fixed bottom-10 right-10 bg-blue-500 w-16 h-16 flex justify-center items-center rounded-full cursor-pointer" id="lang-dropdown">
        <i class="fa-solid fa-globe text-white fa-fw fa-2x inline-block"></i>
        <div class="absolute hidden flex-col bg-white border -top-24 w-48 right-0" id="lang-navbar-hidden">
            <a href="{{ route('lang', ['locale' => 'en']) }}" class="px-4 py-2">English</a>
            <a href="{{ route('lang', ['locale' => 'id']) }}" class="px-4 py-2">Bahasa Indonesia</a>
        </div>
    </div>

    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>
    <!-- <script src="{{asset('js/clipboard.js')}}"></script> -->

    @yield('javascript')

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