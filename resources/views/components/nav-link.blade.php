@props(['active' => false])

<a
    aria-current="{{ $active ? 'page': 'false' }}"
    class="{{ $active ? 'bg-gray-950/50 text-white': 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
    {{ $attributes }}
>
{{$slot}}
</a>

{{-- <{{ $type }}
        aria-current="{{ $active ? 'page': 'false' }}"
        class="{{ $active ? 'bg-gray-950/50 text-white': 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
        {{ $attributes }}
    >
    {{$slot}}
    </{{ $type }}> --}}

{{-- @if ($type === 'a')
    <a
        aria-current="{{ $active ? 'page': 'false' }}"
        class="{{ $active ? 'bg-gray-950/50 text-white': 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
        {{ $attributes }}
    >
    {{$slot}}
    </a>
@elseif ($type === 'button')
    <button
        aria-current="{{ $active ? 'page': 'false' }}"
        class="{{ $active ? 'bg-gray-950/50 text-white': 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
        {{ $attributes }}
    >
    {{$slot}}
</button>
@endif --}}

{{-- Alternative but less preferred way to handle the component rendering: --}}
{{-- @php
    if ($type === 'a') {
        echo '<a aria-current="' . ($active ? 'page' : 'false') . '"
                 class="' . ($active ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white') . ' rounded-md px-3 py-2 text-sm font-medium"
                 ' . $attributes . '>' . $slot . '</a>';
    } elseif ($type === 'button') {
        echo '<button aria-current="' . ($active ? 'page' : 'false') . '"
                    class="' . ($active ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white') . ' rounded-md px-3 py-2 text-sm font-medium"
                    ' . $attributes . '>' . $slot . '</button>';
    }
@endphp --}}
