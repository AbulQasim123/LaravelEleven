<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <hr>
    {{ $slot }}
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
