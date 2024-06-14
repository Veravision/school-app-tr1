
    @if (Auth::guard('admin')->check())
    {{Auth::guard('admin')->user()->name}}
    @else
    world
    @endif

