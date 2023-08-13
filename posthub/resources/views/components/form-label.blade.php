<label {{ $attributes->merge([
    'class' => 'form-label fw-bold',
    'for' => null,
]) }}>
    {{ $label }} @if($required) <span class="text-danger">*</span> @endif
</label>