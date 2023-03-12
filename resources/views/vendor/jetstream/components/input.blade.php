@props(['placeholder', 'label', 'icon' => null])

<div class="flex items-center mt-0 text-secondary-dark border-t-[0px] border-x-[0px] border-b-[4px] border-b-primary focus:border-b-primary-dark rounded-t-md bg-secondary-light relative">
    @if ($icon)
    <p class="pl-3">{{$icon}}</p>
    @endif
    <input {!! $attributes->merge(['class' => 'px-3 group md:text-xl w-full bg-inherit border-none focus:ring-0', 'aria-labelledby' => $placeholder, 'placeholder' => $placeholder]) !!}>
    @if ($icon)
    <label class="absolute -top-3 left-10 text-primary font-semibold">
        {{ $label }}
        @if ($attributes->get('required'))
        <span>*</span>
        @endif
    </label>
    @else
    <label class="absolute -top-3 left-6 text-primary font-semibold">
        {{ $label }}
        @if ($attributes->get('required'))
        <span>*</span>
        @endif
    </label>
    @endif
</div>
