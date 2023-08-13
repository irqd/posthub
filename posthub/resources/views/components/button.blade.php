@php
    $color = $color ?? 'primary';    
@endphp

<button {{ $attributes->merge([
    'type' => 'button',
    'class' => "btn btn-{$color}",
    'style' => null,
]) }}>
    {{ $slot }}
</button>