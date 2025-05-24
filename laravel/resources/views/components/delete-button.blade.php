<form action="{{ $action }}" method="POST" class="max-w-max max-h-max">
    @csrf
    @method('DELETE')
    <button type="submit" class="{{ $class ??  'text-red-400 text-sm tracking-wide font-medium cursor-pointer flex gap-2 items-center justify-center hover:underline'}}">
        {{ $slot }}
    </button>
</form>