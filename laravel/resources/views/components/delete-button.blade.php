<form action="{{ $action }}" method="POST" class="max-w-max max-h-max">
    @csrf
    @method('DELETE')
    <button type="submit" class="{{ $class ??  'text-red-400 text-sm tracking-wide font-medium cursor-pointer hover:underline'}}">
        {{ $slot }}
    </button>
</form>