@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 link'
            : 'inline-flex items-center px-1 active-link text-destacar';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
