<ul class="navbar-nav">
    @foreach(panel()->getNavigations() as $item)
        @php
            $item->render(false);
            $hasChildren = (bool)count($item->getChildren());
        @endphp
        <li class="nav-item @if($hasChildren) dropdown @endif">
            <a class="nav-link @if($hasChildren) dropdown-toggle @endif" @if($hasChildren) role="button" data-bs-toggle="dropdown"
               @else href="{{$item->getLink()}}" @endif>
                @if($icon = $item->getIcon())
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                    {!! render($icon) !!}
                    </span>
                @endif
                <span class="nav-link-title"> {{$item->getLabel()}} </span>
                @if($badge = $item->getBadge())
                    <span class="badge badge-sm bg-{{$item->getBadgeColor()}} text-{{$item->getBadgeColor()}}-fg">
                        {{$badge}}
                    </span>
                @endif
            </a>
            @if($hasChildren)
                <div class="dropdown-menu" data-bs-popper="static">
                    @foreach($item->getChildren() as $child)
                        @php
                            $child->render(false);
                        @endphp
                        <a class="dropdown-item" href="{{$child->getLink()}}">
                            @if($icon = $child->getIcon())
                                {!! render($icon) !!}
                            @endif
                            {{$child->getLabel()}}
                            @if($badge = $child->getBadge())
                                <span class="ms-auto badge badge-sm bg-{{$child->getBadgeColor()}} text-{{$child->getBadgeColor()}}-fg">
                                    {{$badge}}
                                </span>
                            @endif
                        </a>
                    @endforeach
                </div>
            @endif
        </li>
    @endforeach
</ul>
