@props(['active'])

<a {{ $attributes }} class="nav-link {{ $active ? '' : 'collapsed' }}">
    @if ($icon)
        {{ $icon }}
    @endif

    <span>{{ $slot }}</span>
</a>
