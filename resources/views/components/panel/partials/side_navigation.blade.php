<aside {{panel()->getAttributes('aside')->merge(['class'=>'navbar navbar-vertical navbar-expand-lg'])}}>
    <div class="container-fluid">
        <!-- BEGIN NAVBAR TOGGLER -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- END NAVBAR TOGGLER -->
        <!-- BEGIN NAVBAR LOGO -->
        <div class="navbar-brand navbar-brand-autodark">
            <a href="{{panel()->getHomeUrl()}}">
                @include('sentosa::components.panel.partials.brand_logo')
            </a>
        </div>

        <div class="navbar-nav flex-row d-lg-none">
            @include('sentosa::components.partials.children', [
               'children' => panel()->getChildren(\Sentosa\Components\Panel\Panel::CHILDREN_POSITION_BEFORE_USER),
            ])
            @include('sentosa::components.panel.partials.user_navigation')
        </div>

        <!-- END NAVBAR LOGO -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <!-- BEGIN NAVBAR MENU -->
            <ul class="navbar-nav pt-lg-3">
                @foreach(panel()->getNavigations() as $item)
                    @php
                        $item->render(false);
                        $hasChildren = (bool)count($item->getChildren());
                    @endphp
                    <li class="nav-item @if($hasChildren) dropdown @endif">
                        <a class="nav-link @if($hasChildren) dropdown-toggle @endif" @if($hasChildren) role="button"
                           data-bs-toggle="dropdown"
                           @else href="{{$item->getLink()}}" @endif>
                            @if($icon = $item->getIcon())
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    {!! render($icon) !!}
                    </span>
                            @endif
                            <span class="nav-link-title"> {{$item->getLabel()}} </span>
                            @if($badge = $item->getBadge())
                                <span
                                    class="badge badge-sm bg-{{$item->getBadgeColor()}} text-{{$item->getBadgeColor()}}-fg">
                        {{$badge}}
                    </span>
                            @endif
                        </a>
                        @if($hasChildren)
                            <div class="dropdown-menu aside-dropdown" data-bs-popper="static">
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
                                            <span
                                                class="ms-auto badge badge-sm bg-{{$child->getBadgeColor()}} text-{{$child->getBadgeColor()}}-fg">
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
        </div>
    </div>
</aside>
