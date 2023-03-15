@props(['title'])

<div>
    <div class="relative min-h-screen flex flex-col justify-center items-center bg-gradient-to-tl from-orange-400 {{-- via-teal-600 --}} to-cyan-700 overflow-hidden">
        <div class="absolute opacity-40 flex justify-center items-center h-screen overflow-hidden">
            <img class="min-h-full object-cover" src="{{ asset('storage/images/flextory_login.jpg') }}" alt="Image d'arrière plan de la Flextorye">
        </div>
        <div class="container mx-auto z-10 text-secondary-light">
            <div class="mx-auto flex flex-col justify-center items-center w-full max-w-[800px]">
                <div class="w-full p-5 md:p-10 lg:px-12 shadow-md overflow-hidden bg-secondary-light bg-opacity-30 shadow-boxblur backdrop-blur-md rounded-xl text-secondary-light">
                    <p class="text-xl md:text-[40px] text-center text-secondary-light font-semibold italic">{{ $title }}</p>
                    <div class="mt-4 md:mt-8">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
