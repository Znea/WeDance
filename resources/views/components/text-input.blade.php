@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block py-2.5 px-0 w-full text-destacar bg-transparent border-0 border-b-2 border-secondary appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-darken peer']) !!}>
