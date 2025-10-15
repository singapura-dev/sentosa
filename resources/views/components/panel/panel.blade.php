@php use Sentosa\Components\Panel\Panel; @endphp
<x-sentosa::layouts.html :html-attributes="$self->getAttributes('html')">
    <x-sentosa::providers.toast>
        @include('sentosa::components.partials.children', [
            'children' => panel()->getChildren(Panel::CHILDREN_POSITION_BEFORE_PAGE),
        ])
        <div class="page">
            @include('sentosa::components.partials.children', [
                'children' => panel()->getChildren(Panel::CHILDREN_POSITION_BEFORE_HEADER),
            ])
            <!-- BEGIN NAVBAR  -->
            <header class="navbar navbar-expand-md d-print-none">
                <div class="container-xl">
                    <!-- BEGIN NAVBAR TOGGLER -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- END NAVBAR TOGGLER -->
                    <!-- BEGIN NAVBAR LOGO -->
                    <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                        <a href="{{panel()->getHomeUrl()}}" aria-label="{{panel()->getBrandName()}}">
                            {{panel()->getBrandName()}}
                        </a>
                    </div>
                    <!-- END NAVBAR LOGO -->
                    <div class="navbar-nav flex-row order-md-last">
                        @include('sentosa::components.partials.children', [
                            'children' => panel()->getChildren(Panel::CHILDREN_POSITION_BEFORE_USER),
                        ])
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                               aria-label="Open user menu">
                                <span class="avatar avatar-sm"
                                      style="background-image: url({{panel()->auth()->user()->avatar}})"> </span>
                                <div class="d-none d-xl-block ps-2">
                                    <div>{{panel()->auth()->user()->name}}</div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                @include('sentosa::components.panel.partials.user_navigation')
                            </div>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        @include('sentosa::components.panel.partials.navigation')
                    </div>
                </div>
            </header>
            <!-- END NAVBAR  -->
            <div class="page-wrapper">
                <!-- BEGIN PAGE HEADER -->
                @if($header_children = $self->getChildren(Panel::CHILDREN_POSITION_HEADER))
                    <div class="page-header">
                        @include('sentosa::components.partials.children',[
                            'children' => $header_children,
                        ])
                    </div>
                @endif
                <!-- END PAGE HEADER -->
                <!-- BEGIN PAGE BODY -->
                <div class="page-body">
                    <div class="container-xl">
                        @include('sentosa::components.partials.children', [
                            'children' => $self->getChildren(),
                        ])
                    </div>
                </div>
                <!-- END PAGE BODY -->
                @if($footer_children = $self->getChildren(Panel::CHILDREN_POSITION_FOOTER))
                    <!--  BEGIN FOOTER  -->
                    <footer class="footer footer-transparent d-print-none">
                        @include('sentosa::components.partials.children',[
                           'children' => $footer_children,
                        ])
                    </footer>
                    <!--  END FOOTER  -->
                @endif
            </div>
        </div>
    </x-sentosa::providers.toast>

    @pushonce('head_meta')
        <title>{{panel()->getPageTitle() ?: panel()->getBrandName()}}</title>
    @endpushonce

    @pushonce('before_scripts')
        @include('sentosa::components.partials.children', [
            'children' => panel()->getChildren(Panel::CHILDREN_POSITION_BEFORE_SCRIPT),
        ])
    @endpushonce

    @pushonce('scripts')
        @include('sentosa::components.partials.children', [
            'children' => panel()->getChildren(Panel::CHILDREN_POSITION_SCRIPT),
        ])
    @endpushonce

    @pushonce('after_scripts')
        @include('sentosa::components.partials.children', [
            'children' => panel()->getChildren(Panel::CHILDREN_POSITION_AFTER_SCRIPT),
        ])
    @endpushonce

    @pushonce('before_styles')
        @include('sentosa::components.partials.children', [
                'children' => panel()->getChildren(Panel::CHILDREN_POSITION_BEFORE_STYLE),
        ])
    @endpushonce

    @pushonce('styles')
        @include('sentosa::components.partials.children', [
            'children' => panel()->getChildren(Panel::CHILDREN_POSITION_STYLE),
        ])
    @endpushonce
    @pushonce('after_styles')
        @include('sentosa::components.partials.children', [
            'children' => panel()->getChildren(Panel::CHILDREN_POSITION_AFTER_STYLE),
        ])
    @endpushonce
</x-sentosa::layouts.html>

