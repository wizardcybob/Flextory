<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zone') }}
        </h2>
    </x-slot>

    {{-- VIEW --}}
    <div class="w-fit mx-auto flex flex-col gap-8">
        @if ($adeareas->isNotEmpty())
        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($adeareas as $adearea)
            <li>
                <div class="bg-tertiary h-[350px] w-[350px] relative">
                    <div class="w-full h-full overflow-hidden">
                        <img class="h-full" src="{{ asset('storage/images/flextory_login.jpg') }}" alt="Image illustrant la zone" />
                    </div>
                    <div class="absolute inset-0 m-6 backdrop-blur-md flex flex-col items-center justify-center">
                        <p class="titre_page">{{ $adearea->name }}</p>
                        <ul class="grid grid-cols-2 gap-2 p-4 w-4/5 bg-primary">
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
