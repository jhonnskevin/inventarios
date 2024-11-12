<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title my-auto">@yield('page-title', 'Bienvenido')</h1>
    <div>
    <ol class="breadcrumb mb-0">
        @if(isset($breadcrumbs) && count($breadcrumbs) > 0)
            @foreach($breadcrumbs as $breadcrumb)
                <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}"
                    aria-current="{{ $loop->last ? 'page' : '' }}">
                    @if(!$loop->last)
                        <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                    @else
                        {{ $breadcrumb['name'] }}
                    @endif
                </li>
            @endforeach
        @else
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        @endif
    </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
