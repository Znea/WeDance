<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-3 bg-destacar dark:bg-gray-200 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
