@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-0 text-secondary-dark border-t-[0px] border-x-[0px] border-b-[4px] border-b-primary focus:border-b-primary-dark rounded-t-md overflow-hidden bg-secondary-light']) !!}>
