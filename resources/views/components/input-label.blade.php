@props(['value'])

<label {{ $attributes->merge(['class' => 'peer']) }}>
    {{ $value ?? $slot }}
</label>
