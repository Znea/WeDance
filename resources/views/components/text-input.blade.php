@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block py-2.5 px-0 w-full text-darken bg-transparent border-0 border-b-2 border-secondary appearance-none  focus:outline-none focus:ring-0 focus:border-darken peer']) !!}>
