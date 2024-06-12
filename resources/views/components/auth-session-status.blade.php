@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-secondary text-center text-green-600 dark:text-green-400']) }}>
        {{ $status }}
    </div>
@endif
