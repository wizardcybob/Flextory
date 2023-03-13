@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm text-primary font-semibold mb-1']) }}>
    {{ $value ?? $slot }}
</label>
