@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-0 text-secondary-dark border-b-[4px] border-b-primary focus:border-b-primary-dark rounded-t-md overflow-hidden']) !!}>
