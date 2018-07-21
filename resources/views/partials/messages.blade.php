{{-- Errors --}}
@if(count($errors) >0 )
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif

{{-- Error --}}
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- Success --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- Warning --}}
@if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
            {{session('warning')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif