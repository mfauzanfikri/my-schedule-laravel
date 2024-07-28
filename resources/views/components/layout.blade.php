<x-header>
    <x-slot:title>{{ $title }}</x-slot:title>
</x-header>


<main id="main" class="main">
    {{ $slot }}
</main>

<x-footer>
    <x-slot:script>
        {{ $script ?? null }}
    </x-slot:script>
</x-footer>
