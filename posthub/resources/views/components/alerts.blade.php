@if(session()->has($type))
    <div {{ $attributes->merge([
        'class' => 'alert alert-' . $type . ' alert-dismissible fade show',
        'role' => 'alert',
    ]) }}>
        <strong>Error!</strong> {{ session($type) }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif