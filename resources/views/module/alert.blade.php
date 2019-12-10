
<div class="sufee-alert alert with-close alert-{{ $alert ?? 'success' }} alert-dismissible fade show">
    <span class="badge badge-pill badge-{{ $alert ?? 'success' }}">Success</span>
    {{ $title ?? 'You successfully logged in as Admin.' }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>