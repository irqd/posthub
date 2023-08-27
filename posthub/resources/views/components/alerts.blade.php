@if(session()->has($type))
    <div {{ $attributes->merge([
        'class' => 'alert alert-' . $type . ' alert-dismissible fade show',
        'role' => 'alert',
    ]) }}>
        @if($type == 'danger')
            <strong>Error!</strong>
        @elseif($type == 'success')
            <strong>Success!</strong>
        @endif
        {{ session($type) }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif