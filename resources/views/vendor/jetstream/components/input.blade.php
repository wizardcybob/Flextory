@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-secondary-dark border-b-[2.5px] border-blue-900 border-t rounded-t-md overflow-hidden']) !!}>
