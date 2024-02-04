<div class="block w-full px-4 border-b">
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <div class="container mx-auto flex items-center justify-between py-4">
        <a href="{{route('admin')}}" class="font-bold text-lg">Password Manager</a>

        <div class="md:flex gap-x-6 hidden">
            <a href="{{route('admin')}}" class="font-medium">Home</a>
            <a href="{{route('profile')}}" class="font-medium">@lang('public.myProfile')</a>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="font-medium">Logout</button>
            </form>
        </div>

        <div class="flex flex-col gap-y-1 cursor-pointer md:hidden" id="navbar-open" data-target="navbar-hidden">
            <div class="w-7 h-1 bg-black"></div>
            <div class="w-7 h-1 bg-black"></div>
            <div class="w-7 h-1 bg-black"></div>
        </div>
    </div>
</div>

<div class="fixed top-0 left-0 min-h-screen w-full bg-black bg-opacity-50 z-10 md:hidden hidden" id="navbar-hidden">
    <div class="bg-white w-96 ml-auto flex flex-col">
        <button class="font-bold text-4xl w-14 h-14 ml-auto border flex justify-center items-center" id="navbar-close">
            <span>&times;</span>
        </button>
        <!-- <hr class="border my-4"> -->
        <div class="flex flex-col divide-y-2">
            <a href="{{route('admin')}}" class="font-medium px-3 py-6 inline-block text-left hover:bg-gray-100">Home</a>
            <a href="{{route('profile')}}" class="font-medium px-3 py-6 inline-block text-left hover:bg-gray-100">Profil Saya</a>
            <form action="{{route('logout')}}" method="post" class="grid">
                @csrf
                <button type="submit" class="font-medium px-3 py-6 inline-block text-left hover:bg-gray-100">Logout</button>
            </form>
        </div>
    </div>
</div>