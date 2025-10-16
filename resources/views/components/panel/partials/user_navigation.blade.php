<div class="nav-item dropdown">
    <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
       aria-label="Open user menu">
            <span class="avatar avatar-sm"
                  style="background-image: url({{panel()->auth()->user()->avatar}})"> </span>
        <div class="d-none d-xl-block ps-2">
            <div>{{panel()->auth()->user()->name}}</div>
            @if($role_name = panel()->auth()->user()->role_name)
                <div class="mt-1 small text-secondary">{{$role_name}}</div>
            @endif
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        @foreach(panel()->getNavigations(\Sentosa\Components\Panel\Panel::NAVIGATION_POSITION_USER) as $item)
            @php $item->render(false);@endphp
            <a href="{{$item->getLink()}}" class="dropdown-item">
                @if($icon = $item->getIcon())
                    {!! render($icon) !!}
                @endif
                {{ $item->getLabel() }}
                @if($badge = $item->getBadge())
                    <span
                        class="ms-auto badge badge-sm bg-{{$item->getBadgeColor()}} text-{{$item->getBadgeColor()}}-fg">
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
                <i class="ti ti-logout"></i> @lang('sentosa::base.logout')
            </a>
        @endif
    </div>
</div>
