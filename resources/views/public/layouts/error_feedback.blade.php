@if(session()->has('status'))
    @if(session()->get('status') == 'success')
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @else
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
    @endif
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
