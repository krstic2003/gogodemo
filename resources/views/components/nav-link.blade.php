@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center purple-bold'
            : 'inline-flex items-center';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
