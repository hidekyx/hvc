@if (Session::has('success'))
<div role="alert" class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
    <strong><i class="fa fa-exclamation-circle"></i> Success!</strong>
    {{ Session::get('success') }}
</div>
@endif
@if (Session::has('error'))
<div role="alert" class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
    <strong><i class="fa fa-exclamation-circle"></i> Failed!</strong>
    {{ Session::get('error') }}
</div>
@endif