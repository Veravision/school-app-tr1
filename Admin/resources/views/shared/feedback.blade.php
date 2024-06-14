@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- success message --}}
@if(Session::has('success'))
<div class="alert alert-success" alert>
    <h4 class="text-succsess">Success!</h4>
    <p>{{ Session::get('success') }}</p>
</div>

@endif

{{-- info message --}}
@if(Session::has('info'))
<div class="alert alert-info" alert>
    <h4 class="text-info">Infomation!</h4>
    <p>{{ Session::get('info') }}</p>
</div>
@endif

{{-- warning message --}}
@if(Session::has('warning'))
<div class="alert alert-warning" alert>
    <h4 class="text-warning">Warning!</h4>
    <p>{{ Session::get('warning') }}</p>
</div>
@endif
{{-- error message --}}
@if(Session::has('error'))
<div class="alert alert-danger" alert>
    <h4 class="text-danger">Error!</h4>
    <p>{{ Session::get('error') }}</p>
</div>
@endif
