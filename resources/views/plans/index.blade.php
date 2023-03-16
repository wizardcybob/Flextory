<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plan') }}
        </h2>
    </x-slot>

    {{-- VIEW --}}
    <div>
        <object data="{{ asset('storage/pdf/plan_flyer.pdf') }}" type="application/pdf" width="100%" height="500px">
            <embed src="{{ asset('storage/pdf/plan_flyer.pdf') }}" type="application/pdf" zoom="50%" />
        </object>
    </div>
</x-app-layout>
