<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fiches') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto flex flex-col gap-8 md:gap-12">
        <h1 class="titre_page">Fiches d'améliorations</h1>
        <a href="{{ route('sheet.create') }}" class="btn_tertiary">Créer une fiche d'amélioration<i class="fa-solid fa-sheet-plastic"></i></a>

        @if ($sheets->isNotEmpty())
        <ul class="border-2 border-primary rounded">
            @foreach ($sheets as $index => $sheet)
            <li class="{{ $index % 2 == 0 ? 'bg-secondary' : 'bg-secondary-light' }} flex justify-between items-center h-12 px-4">
                <a href="{{ route('sheet.show', $sheet) }}">
                    <p class="flex gap-2"><span class="font-semibold">N°{{ $sheet->id }} - {{ $sheet->title }}</span>&#40;{{ $sheet->area_id }} / {{ $sheet->category_id }}&#41;</p>
                </a>
                <div class="flex gap-2">
                    <a class="bg-edit hover:bg-edit-dark text-white py-1 px-2 rounded" aria-labelledby="Modifier" href="{{ route('sheet.edit', ['sheet' => $sheet->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('sheet.destroy', ['sheet' => $sheet->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-delete hover:bg-delete-dark text-white py-1 px-2 rounded" aria-labelledby="Supprimer" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</x-app-layout>
