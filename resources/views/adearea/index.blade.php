<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zone') }}
        </h2>
    </x-slot>

    {{-- VIEW --}}
    <div class="w-fit mx-auto flex flex-col gap-8">
        <div class="flex justify-center">
            <a href="{{ route('sheet.create') }}" class="btn_primary w-fit" title="Ajouter une fiche d'amélioration"><i class="fa-solid fa-plus" aria-hidden="true"></i>Ajouter une fiche d'amélioration</a>
        </div>
        @if ($adeareas->isNotEmpty())
        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-3 md:gap-4">
            @foreach ($adeareas as $adearea)
            <li>
                <div class="bg-secondary-dark h-full p-4 sm:p-3 md:p-5" style="background-image: url({{ asset('storage/images/flextory_login.jpg') }}); background-size:cover;"> <!--350px-->
                    <div class="p-4 sm:p-3 md:p-5 backdrop-blur-md bg-white/40 flex flex-col items-center justify-center gap-5 h-full">
                        <p class="titre_card uppercase">{{ $adearea->name }}</p>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 w-full">
                            @foreach ($adearea->areas as $area)
                            <li class="btn_tertiary w-full"><a href="{{ route('area.show', $area) }}">{{ $area->name }} </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</x-app-layout>
