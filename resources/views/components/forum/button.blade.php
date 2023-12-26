<button {{ $attributes->merge(['class' => 'bg-green_bg text-white border border-green_bg hover:bg-coin text-green_text px-3 py-2 rounded-md inline-block']) }}>
    {{ $slot }}
</button>
