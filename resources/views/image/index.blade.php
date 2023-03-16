<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Images') }}
        </h2>
    </x-slot>

    {{-- VIEW --}}
    <div class="w-full mx-auto flex flex-col gap-8">
        <a href="javascript:history.go(-1)" class="btn_primary w-fit" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>Retour</a>
        <div class="flex flex-col md:flex-row gap-2 md:gap-0 w-full justify-between items-start md:items-center">
            <h1 class="titre_page">Importation d'images</h1>
        </div>
            <form action="{{ route('image.store') }}" method="POST" class="shadow p-12" enctype="multipart/form-data">
            @csrf
            <label class="block mb-4">
                <span class="sr-only">Choose File</span>
                <input type="file" name="image"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-tertiary/20 file:text-tertiary hover:file:bg-tertiary/50 cursor-pointer" />
                @error('image')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </label>
            <div class="flex justify-end">
                <button type="submit" class="btn_primary">Enregistrer</button>
            </div>
        </form>
    </div>
</x-app-layout>
