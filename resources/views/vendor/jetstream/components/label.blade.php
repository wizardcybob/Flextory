@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm text-secondary-light font-bold']) }}>
    {{ $value ?? $slot }}
</label>
