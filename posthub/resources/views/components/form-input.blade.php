@php
    $nameAttribute = $attributes->get('name');
    $hasError = $nameAttribute && $errors->has($nameAttribute);
    $inputClass = 'form-control' . ($hasError ? ' is-invalid' : '');
@endphp

<input {{ $attributes->merge([
    'class' => $inputClass,
    'type' => 'text',
    'id' => null,
    'name' => null,
    'placeholder' => null,
]) }} />

@if ($hasError)
    <div class="text-danger">
        <small>{{ $errors->first($nameAttribute) }}</small>
    </div>
@endif
