@if (session('info'))
<div class="alert alert-dismissible fade show bg-info text-white" role="alert">
    <strong>{!! session('info') !!}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="text-white">&times;</span>
    </button>
</div>
@endif

@if (session('success'))
<div class="alert alert-dismissible fade show bg-success text-white" role="alert">
    <strong>{!! session('success') !!}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="text-white">&times;</span>
    </button>
</div>
@endif

@if (session('warning'))
<div class="alert alert-dismissible fade show bg-warning text-white" role="alert">
    <strong>{!! session('warning') !!}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="text-white">&times;</span>
    </button>
</div>
@endif

@if (session('delete'))
<div class="alert alert-dismissible fade show bg-danger text-white" role="alert">
    <strong>{!! session('delete') !!}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="text-white">&times;</span>
    </button>
</div>
@endif