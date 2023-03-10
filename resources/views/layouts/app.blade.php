<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300;400;700&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/fe255bcd91.js" crossorigin="anonymous"></script>
    </head>
    <body x-data="{showMenu: false, showProfileMenu: false}" class="font-sans font-work antialiased flex flex-col min-h-screen">
        <a href="#content" class="sr-only focus:not-sr-only">
            Accéder au contenu
        </a>
        <div class="bg-gradient-to-tl from-violet-700 via-violet-800 to-blue-900">
            <header class="container mx-auto py-2 md:py-8 flex justify-between items-center text-lg text-secondary-light ">
                <h1 class="font-semibold text-lg md:text-xl">Flextory</h1>
                <p tabindex="0" @click.prevent="showMenu = !showMenu" @keyup.enter="showMenu = !showMenu" class="visible md:invisible"><i class="fa-solid fa-bars"></i></p>
                <nav class="hidden md:flex items-center gap-8 text-lg font-medium">
                    <p class="cursor-pointer"><a href="#" class="group transition duration-300">
                        Plan
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-secondary-light"></span>
                        </a></p>
                    <p class="cursor-pointer"><a href="#" class="group transition duration-300">
                        Pistard
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-secondary-light"></span>
                        </a></p>
                    <div tabindex="0" @click.prevent="showProfileMenu = !showProfileMenu" @keyup.enter="showProfileMenu = !showProfileMenu" class="transition ease-in-out delay-150 hover:scale-110 duration-300 flex items-center cursor-pointer gap-4 bg-secondary-light text-primary py-2 rounded px-4 relative">
                        <p>{{ Auth::user()->name }}</p>
                        <p class="text-xl"><i class="fa-solid fa-circle-user"></i></p>
                        <div x-show="showProfileMenu" class="absolute bg-secondary-light w-64 rounded top-12 right-0 divide-y-2 shadow-inner">
                            <div tabindex="0" @click.prevent="window.location.href='/user/profile'" @keyup.enter="window.location.href='/user/profile'" class=" px-4 py-2 flex justify-between items-center gap-3">
                                <p>Modifier le profil</p>
                                <p class="text-xl"><i class="fa-solid fa-pen-to-square"></i></p>
                            </div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                         <div tabindex="0" class=" px-4 py-2 flex justify-between items-center gap-3">
                                            <p>Déconnexion</p>
                                            <p class="text-xl"><i class="fa-solid fa-right-from-bracket"></i></p>
                                        </div>
                                </x-jet-dropdown-link>
                            </form>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
        <!-- Page Content -->
        <div class="container mx-auto flex-1 flex flex-col pt-10 pb-20">
            <main id="content" class="flex-1 flex flex-col">
                {{ $slot }}
            </main>

        </div>
        <div class="bg-primary-darker">
            <footer class="container mx-auto text-center text-xs text-secondary-light font-medium py-2 md:py-5">Crée par Chloé, Noa, Raphaël, Romain - 2023</footer>
        </div>
        <!-- Menu Burger Mobile -->
        <div x-show="showMenu" class="fixed w-screen h-screen p-8 flex flex-col gap-16 items-center bg-secondary-light  top-0 left-0 z-50 visible md:invisible">
            <p @click.prevent="showMenu = !showMenu" @keyup.enter="showMenu = !showMenu" tabindex="0" class="text-lg"><i class="fa-solid fa-xmark"></i></p>
            <nav class="flex flex-col text-center underline gap-4">
                <p><a href="#">Plan</a></p>
                <p><a href="#">Pistard</a></p>
            </nav>
            <div class="w-fit flex flex-col items-center">
                <p class="border-b p-4 w-full  border-black text-center font-medium">{{ Auth::user()->name }}</p>
                <p class="underline text-center p-4"><a href="/user/profile" class="p-4 w-full">Profil</a></p>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}"
                             @click.prevent="$root.submit();">
                        <p class="p-4 underline text-center text-base">Déconnexion</p>
                    </x-jet-dropdown-link>
                </form>
            </div>
        </div>
    </body>

</html>
