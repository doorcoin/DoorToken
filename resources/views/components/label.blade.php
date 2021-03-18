@props(['value'])

<label {{ $attributes->merge(['class' => 'mb-1']) }}>
    <strong>
    {{ $value ?? $slot }}
    </strong>
</label>
