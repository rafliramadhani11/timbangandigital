<button {{ $attributes->merge(['class' => 'px-4 text-center text-white w-[9.5rem] py-2 my-1 rounded-md font-semibold bg-red-500 hover:text-white dark:hover:bg-red-500 dark:hover:text-white dark:text-white transition duration-200']) }}>
    {{ $slot }}
</button>