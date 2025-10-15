@foreach(panel()->getNavigations(\Sentosa\Components\Panel\Panel::NAVIGATION_POSITION_USER) as $item)
    @php $item->render(false);@endphp
    <a href="{{$item->getLink()}}" class="dropdown-item">
        @if($icon = $item->getIcon())
            {!! render($icon) !!}
        @endif
        {{ $item->getLabel() }}
        @if($badge = $item->getBadge())
            <span class="ms-auto badge badge-sm bg-{{$item->getBadgeColor()}} text-{{$item->getBadgeColor()}}-fg">
                    {{$badge}}
                </span>
        @endif
    </a>

    @if($loop->last)
        <div class="dropdown-divider"></div>
    @endif
@endforeach

@if(panel()->hasLogin())

    <a href="{{panel()->route('auth.logout')}}" class="dropdown-item">
        <i class="ti ti-logout"></i> Logout
    </a>
@endif
