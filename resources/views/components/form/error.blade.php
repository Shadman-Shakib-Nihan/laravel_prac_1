
@if ($errors->has($field))
    <p class="mt-2 text-xs text-red-500">{{ $errors->first($field) }}</p>
@endif