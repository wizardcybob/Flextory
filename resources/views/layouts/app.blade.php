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
            <header class="container mx-auto py-2 md:py-5 flex justify-between items-center text-lg text-white ">
                <div>
                    <a href="{{ route('adearea.index')}}">
                        <img class="max-w-[100px] md:max-w-[150px] w-full" src="{{ asset('storage/images/logo_flextory_blanc.png') }}" alt="Logo flextory" aria-labelledby="Logo de la Flextory et son slogan 'L'homme au coeur de l'usine-école du futur'">
                    </a>
                </div>
                <p tabindex="0" @click.prevent="showMenu = !showMenu" @keyup.enter="showMenu = !showMenu" class="cursor-pointer p-2 text-[1.7rem] visible md:invisible"><i class="fa-solid fa-bars"></i></p>
                <nav class="hidden md:flex items-center gap-8 text-lg font-medium">
                    <p class="cursor-pointer"><a href="{{ route('adearea.index')}}" class="group transition duration-300">
                        Accueil
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-[2.3px] bg-secondary-light {{ Request::is('adearea') ? 'max-w-full' : '' }}"></span>
                        </a></p>

                    <p class="cursor-pointer"><a href="{{ route('image.index')}}"  class="group transition duration-300">
                        Image
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-[2.3px] bg-secondary-light {{ Request::is('adearea') ? 'max-w-full' : '' }}"></span>
                        </a></p>
                    <p class="cursor-pointer"><a href="{{ route('user.index')}}" class="group transition duration-300">
                        Utilisateurs
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-[2.3px] bg-secondary-light {{ Request::is('adearea') ? 'max-w-full' : '' }}"></span>
                        </a></p>

                    <p class="cursor-pointer"><a href="{{ route('plans.index')}}" class="group transition duration-300">
                        Plan
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-[2.3px] bg-secondary-light {{ Request::is('plans') ? 'max-w-full' : '' }}"></span>
                        </a></p>
                    {{-- <p class="cursor-pointer"><a href="#" class="group transition duration-300">
                        Pistar
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-[2.3px] bg-secondary-light {{ Request::is('') ? 'max-w-full' : '' }}"></span>
                        </a></p> --}}
                    <div tabindex="0" @click.prevent="showProfileMenu = !showProfileMenu" @keyup.enter="showProfileMenu = !showProfileMenu" class="btn_tertiary relative z-10">
                        <p>{{ Auth::user()->name }}</p>
                        <p class="text-xl"><i class="fa-solid fa-circle-user"></i></p>
                        <div x-show="showProfileMenu" class="mt-2 absolute w-64 rounded-sm top-12 right-0 divide-y-2 divide-tertiary shadow-inner overflow-hidden border-tertiary border-2">
                            <div tabindex="0" @click.prevent="window.location.href='{{ route('profile.show') }}'" @keyup.enter="window.location.href='{{ route('profile.show') }}'" class="bg-secondary-light text-tertiary hover:bg-tertiary hover:text-white px-4 py-2 flex justify-between items-center gap-3">
                                <p>Modifier le profil</p>
                                <p class="text-xl"><i class="fa-solid fa-pen-to-square"></i></p>
                            </div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                         <div tabindex="0" class="bg-secondary-light text-tertiary hover:bg-tertiary hover:text-white px-4 py-2 flex justify-between items-center gap-3">
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
        <div class="container mx-auto flex-1 flex flex-col pt-5 pb-10 md:pt-10 md:pb-20">
            <main id="content" class="flex-1 flex flex-col">
                {{ $slot }}
            </main>

        </div>
        <div class="bg-primary-darker px-6">
            <footer class="container mx-auto text-center text-xs text-white font-medium py-2 md:py-5">Créé par Chloé, Noa, Raphaël, Romain - PROJET TUTORE 2023</footer>
        </div>
        <!-- Menu Burger Mobile -->
        <div x-show="showMenu" class="fixed w-screen h-screen overflow-hidden p-8 flex flex-col justify-center gap-16 text-lg items-center bg-primary text-white inset-0 z-50 visible md:invisible">
            <p @click.prevent="showMenu = !showMenu" @keyup.enter="showMenu = !showMenu" tabindex="0" class="text-[2.2rem] p-2 cursor-pointer hover:text-tertiary"><i class="fa-solid fa-xmark"></i></p>
            {{-- LOGO --}}
            {{-- <div class="flex justify-center">
                <a href="/adearea">
                    <img class="max-w-[150px]" src=".{{ asset('../../../storage/images/logo_flextory_blanc.png') }}" alt="Logo flextory" aria-labelledby="Logo de la Flextory et son slogan 'L'homme au coeur de l'usine-école du futur'">
                </a>
            </div> --}}
            <nav class="flex flex-col text-center gap-4">
                <p class="cursor-pointer"><a href="/adearea" class="group transition duration-300">
                    Accueil
                    <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-[2.3px] bg-secondary-light {{ Request::is('adearea') ? 'max-w-full' : '' }}"></span>
                    </a></p>
                <p class="cursor-pointer"><a href="#" class="group transition duration-300">
                    Plan
                    <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-[2.3px] bg-secondary-light {{ Request::is('plans') ? 'max-w-full' : '' }}"></span>
                    </a></p>
                {{-- <p class="cursor-pointer"><a href="#" class="group transition duration-300">
                    Pistar
                    <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-[2.3px] bg-secondary-light {{ Request::is('') ? 'max-w-full' : '' }}"></span>
                    </a></p> --}}
            </nav>
            <div class="w-fit flex flex-col items-center bg-primary-darker px-4 pb-4 rounded">
                <div class="flex justify-center border-b-2 p-4 w-full gap-3 border-tertiary font-medium">
                    <p>{{ Auth::user()->name }}</p>
                    <p class="text-xl"><i class="fa-solid fa-circle-user"></i></p>
                </div>
                <p class="cursor-pointer my-4"><a href="/user/profile" class="group transition duration-300">
                    Mon profil
                    <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-[2.3px] bg-secondary-light {{ Request::is('user/profile') ? 'max-w-full' : '' }}"></span>
                    </a></p>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}"
                             @click.prevent="$root.submit();">
                        <p class="p-4 text-center text-base btn_tertiary">Déconnexion</p>
                    </x-jet-dropdown-link>
                </form>
            </div>
        </div>
    </body>

</html>
