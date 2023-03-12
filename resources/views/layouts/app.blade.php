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
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/fe255bcd91.js" crossorigin="anonymous"></script>
    </head>
    <body x-data="{showMenu: false, showProfileMenu: false}" class="font-work antialiased flex flex-col min-h-screen">
        <a href="#content" class="sr-only focus:not-sr-only">
            Accéder au contenu
        </a>
        <div class="bg-primary">
            <header class="container mx-auto py-2 md:py-7 flex justify-between items-center text-lg text-secondary-light ">
                <div class="w-40">
                    <img src=".{{ asset('../../../storage/images/logo_flextory_slogan.png') }}" alt="Logo flextory" aria-labelledby="Logo de la Flextory et son slogan 'L'homme au coeur de l'usine-école du futur'">
                </div>
                <p tabindex="0" @click.prevent="showMenu = !showMenu" @keyup.enter="showMenu = !showMenu" class="cursor-pointer p-2 text-[1.7rem] visible md:invisible"><i class="fa-solid fa-bars"></i></p>
                <nav class="hidden md:flex items-center gap-8 text-lg font-medium">
                    <p class="cursor-pointer"><a href="#" class="group transition duration-300">
                        Plan
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-[2.3px] bg-secondary-light"></span>
                        </a></p>
                    <p class="cursor-pointer"><a href="#" class="group transition duration-300">
                        Pistard
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-[2.3px] bg-secondary-light"></span>
                        </a></p>
                    <div tabindex="0" @click.prevent="showProfileMenu = !showProfileMenu" @keyup.enter="showProfileMenu = !showProfileMenu" class="btn_primary relative">
                        <p>{{ Auth::user()->name }}</p>
                        <p class="text-xl"><i class="fa-solid fa-circle-user"></i></p>
                        <div x-show="showProfileMenu" class="mt-2 absolute w-64 rounded-sm top-12 right-0 divide-y-2 divide-tertiary shadow-inner overflow-hidden border-tertiary border-2">
                            <div tabindex="0" @click.prevent="window.location.href='/user/profile'" @keyup.enter="window.location.href='/user/profile'" class="bg-secondary-light text-tertiary hover:bg-tertiary hover:text-secondary-light px-4 py-2 flex justify-between items-center gap-3">
                                <p>Modifier le profil</p>
                                <p class="text-xl"><i class="fa-solid fa-pen-to-square"></i></p>
                            </div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                         <div tabindex="0" class="bg-secondary-light text-tertiary hover:bg-tertiary hover:text-secondary-light px-4 py-2 flex justify-between items-center gap-3">
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
            <footer class="container mx-auto text-center text-xs text-secondary-light font-medium py-2 md:py-5">Créé par Chloé, Noa, Raphaël, Romain - PROJET TUTORE 2023</footer>
        </div>
        <!-- Menu Burger Mobile -->
        <div x-show="showMenu" class="fixed w-screen h-screen overflow-hidden p-8 flex flex-col justify-center gap-16 text-lg items-center bg-primary text-secondary-light inset-0 z-50 visible md:invisible">
            <p @click.prevent="showMenu = !showMenu" @keyup.enter="showMenu = !showMenu" tabindex="0" class="text-[1.7rem] p-2 cursor-pointer"><i class="fa-solid fa-xmark"></i></p>
            <nav class="flex flex-col text-center gap-10">
                <p class="transition-all duration-500 h-[2.3px]"><a href="#">Plan</a></p>
                <p class="transition-all duration-500 h-[2.3px]"><a href="#">Pistard</a></p>
            </nav>
            <div class="w-fit flex flex-col items-center">
                <div class="flex justify-center border-b-2 p-4 w-full gap-3 border-secondary-light font-medium">
                    <p>{{ Auth::user()->name }}</p>
                    <p class="text-xl"><i class="fa-solid fa-circle-user"></i></p>
                </div>
                <p class="text-center p-4"><a href="/user/profile" class="p-4 w-full">Mon profil</a></p>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}"
                             @click.prevent="$root.submit();">
                        <p class="p-4 text-center text-base btn_primary">Déconnexion</p>
                    </x-jet-dropdown-link>
                </form>
            </div>
        </div>
    </body>

</html>
