<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier user') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('user.update', ['user' => $user]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p><input type="text" placeholder="name" name="name" value="{{ $user->name }}"></p>
                    <p>
                        <select name="role">
                            <option value=""></option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @if ($user->role == $role->id) selected @endif>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </p>

                    <p><button type="submit">Save</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
