@props([
    'route',
    'label',
    'active' => null,
])
<a href="{{ route($route) }}"
    class="list-group-item list-group-item-action {{ request()->routeIs($active ?? $route) ? 'active' : '' }}">
    {{ $label }}
</a>