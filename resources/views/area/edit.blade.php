<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la zone') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('area.update', ['area' => $area]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p><input type="text" placeholder="name" name="name" value="{{ $area->name }}"></p>
                    <p>
                        <textarea rows="5" placeholder="description" name="description">{{ $area->description }}</textarea>
                    </p>
                    <p><input type="text" placeholder="image" name="image" value="{{ $area->image }}"></p>
                    @foreach ($projets as $projet)
                        <p><input type="checkbox" name="area[]" id="area_{{ $area->id }}" value="{{ $area->id }}" @if(in_array($area->id, $area->projets->pluck('id')->toArray())) checked @endif><label for="area_{{ $projet->id }}">{{ $projet->title }}</label></p>
                    @endforeach
                    <p><button type="submit">Save</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
