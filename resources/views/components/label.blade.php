@props(['value'])

<label {{ $attributes->merge(['class' => 'label-cls']) }}>
    {{ $value ?? $slot }}
</label>
