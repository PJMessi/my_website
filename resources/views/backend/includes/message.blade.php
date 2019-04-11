@if (Session::get('error'))
    <div class="alert alert-danger alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h3 class="alert-heading font-w300 my-2">Error</h3>
        <p class="mb-0">{{ session()->get('error') }}</p>
    </div>
@endif

@if (Session::get('success'))
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h3 class="alert-heading font-w300 my-2">Success</h3>
        <p class="mb-0">{{ session()->get('success') }}</p>
    </div>
@endif

@if (Session::get('warning'))
    <div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h3 class="alert-heading font-w300 my-2">Partial Success</h3>
        <p class="mb-0">{{ session()->get('warning') }}</p>
    </div>
@endif

@if( count( $errors ) > 0 )
   @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h3 class="alert-heading font-w300 my-2">Error</h3>
            <p class="mb-0">{{ $error }}</p>
        </div>
  @endforeach
@endif