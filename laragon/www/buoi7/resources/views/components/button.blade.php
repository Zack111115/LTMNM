@props(['variant' => 'primary'])

@php
    $bgColor = $variant === 'danger' ? '#EF4444' : '#3B82F6';
@endphp

<button {{ $attributes->merge(['style' => "padding: 8px 16px; border: none; border-radius: 4px; color: white; cursor: pointer; background-color: $bgColor;"]) }}>
    {{ $slot }}
</button>