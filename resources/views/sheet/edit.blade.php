<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le sheet') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('sheet.update', ['sheet' => $sheet]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p><input type="text" placeholder="title" name="title" value="{{ $sheet->title }}"></p>
                    <p>
                        <textarea rows="5" placeholder="description" name="description">{{ $sheet->description }}</textarea>
                    </p>
                    <p>
                        <textarea rows="5" placeholder="idea" name="idea">{{ $sheet->idea }}</textarea>
                    </p>
                    <p><input type="text" placeholder="state" name="state" value="{{ $sheet->state }}"></p>
                    <p>
                        <select name="area_id">
                            <option value=""></option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}" @if ($sheet->area_id == $area->id) selected @endif>
                                    {{ $area->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p><button type="submit">Save</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
