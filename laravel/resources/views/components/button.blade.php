@php
    $base = "h-10 px-6 flex gap-2 items-center justify-center text-sm rounded-full font-medium cursor-pointer";

    $styles = match ($type) {
        "filled" => "bg-[#D0BCFF] text-[#381E72] hover:bg-[#D0BCFF]/80 min-w-14",
        "elevated" => "bg-[#1D1B20] text-[#D0BCFF] hover:bg-[#1D1B20]/80 shadow-sm",
        "outlined" => "border border-[#49454F] text-[#CAC4D0] hover:bg-[#322F35]/80 min-w-14",
        "tonal" => "bg-[#4A4458] text-[#E8DEF8] hover:bg-[#4A4458]/80 shadow-sm",
        "text" => "text-[#D0BCFF] min-w-10 hover:bg-[#322F35]/80",
    };
@endphp

<button {{ $attributes->merge(["class" => "$base $styles"]) }}>
    @if ($icon)
        <x-dynamic-component :component="$icon" class="w-5 h-5" />
    @endif
    {{ $slot }}
</button>
