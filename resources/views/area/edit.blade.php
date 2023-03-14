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
                    <p><input type="text" placeholder="Nom" name="name" value="{{ $area->name }}" aria-labelledby="Nom"></p>
                    <p>
                        <textarea rows="5" placeholder="Description" name="description" aria-labelledby="Description">{{ $area->description }}</textarea>
                    </p>
                    <p><input type="text" placeholder="Image" name="image" value="{{ $area->image }}" aria-labelledby="Image"></p>
                    <p>
                        <select name="adearea_id">
                            <option value=""></option>
                            @foreach ($adeareas as $adearea)
                                <option value="{{ $adearea->id }}" @if ($area->adearea_id == $adearea->id) selected @endif>
                                    {{ $adearea->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    @foreach ($projets as $projet)
                        <p><input type="checkbox" name="area[]" id="area_{{ $area->id }}" value="{{ $area->id }}" @if(in_array($area->id, $area->projets->pluck('id')->toArray())) checked @endif><label for="area_{{ $projet->id }}">{{ $projet->title }}</label></p>
                    @endforeach
                    <p>
                        <select name="image">
                            <option value=""></option>
                            @foreach ($images as $image)
                                <option value="{{ $image->id }}" @if ($area->image_id == $image->id) selected @endif>
                                    {{ $image->image }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p><button aria-labelledby="Valider" type="submit">Valider</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
