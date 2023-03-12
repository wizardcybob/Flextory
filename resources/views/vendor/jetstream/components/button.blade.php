@props(['type' => 'submit', 'isfullwidth' => true, 'icon' => null, 'iconposition' => 'left'])

@if ($isfullwidth)
<button
    {{ $attributes->merge(['class' => 'w-full flex items-center gap-4 justify-center bg-primary hover:bg-primary-dark text-secondary-light font-medium text-base md:text-xl rounded py-2', 'aria-label' => $slot]) }}>
    @if ($icon)
        <p>{{ $icon }}</p>
        <p>{{ $slot }}</p>
    @else
        <p class="hidden">{{ $icon }}</p>
        <p>{{ $slot }}</p>
    @endif
</button>
@else
<button
    {{ $attributes->merge(['class' => 'w-fit flex items-center gap-4 bg-primary hover:bg-primary-dark text-secondary-light font-medium text-base md:text-xl rounded py-2 px-8', 'aria-label' => $slot]) }}>
    @if ($icon)
        <p>{{ $icon }}</p>
        <p>{{ $slot }}</p>
    @else
        <p class="hidden">{{ $icon }}</p>
        <p>{{ $slot }}</p>
    @endif
</button>
@endif
