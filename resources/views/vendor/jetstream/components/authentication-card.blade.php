<div>
    <div class="relative min-h-screen flex flex-col justify-center items-center bg-gradient-to-tl from-violet-700 via-violet-800 to-blue-900 overflow-hidden">
        <div class="absolute opacity-40 h-full">
            <img class="w-full h-full object-cover" src="{{ asset('storage/images/flextory_login.jpg') }}" alt="Image d'arrière plan de la Flextorye">
        </div>
        <div class="container mx-auto z-10 text-secondary-light">
            <div class="mx-auto flex flex-col justify-center items-center w-full max-w-[800px]">
                <div class="w-full p-5 md:p-10 lg:px-12 shadow-md overflow-hidden bg-secondary-light bg-opacity-30 shadow-boxblur backdrop-blur-md rounded-xl text-secondary-light">
                    <p class="text-xl md:text-[40px] text-center font-bold text-secondary-light">Se connecter</p>
                    <div class="mt-5">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
