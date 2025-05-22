@php
    $base = "h-14 min-w-14 bg-zinc-800 flex items-center justify-between px-4 rounded-md text-sm font-medium";
    $styles = match ($type) {
        "success" => "text-green-300",
        "error" => "text-red-400",
        default => "text-white",
    };
@endphp
<div x-data="{ show: true }" x-show="show" {{ $attributes->merge(["class" => "$base $styles"]) }} x-transition>
    <div class="flex items-center gap-4">
        @if ($type === "success")
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-300" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414L9 13.414l4.707-4.707z" clip-rule="evenodd" />
            </svg>
        @elseif ($type === 'error')
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM9 6a1 1 0 012 0v4a1 1 0 11-2 0V6zm1 8a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd" />
            </svg>
        @endif
        {{ $slot }}
    </div>
    <button type="button" @click="show = false" class="cursor-pointer">
       <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
</div>