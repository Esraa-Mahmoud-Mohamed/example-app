@props([
    'route',
    'label',
    'active' => null,
])
<li class="nav-item {{ request()->routeIs($active ?? $route) ? 'active' : '' }}">
    <a class="nav-link" href="{{ route($route) }}">{{$label}}</a>
</li>



