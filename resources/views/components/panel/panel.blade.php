@php use Sentosa\Components\Panel\Panel; @endphp
<x-sentosa::layouts.html :html-attributes="$self->getAttributes('html')" :body-attributes="$self->getAttributes('body')->merge(['class'=>'layout-fluid'])">
    <x-sentosa::providers.toast>
        @include('sentosa::components.partials.children', [
            'children' => $self->getChildren(Panel::CHILDREN_POSITION_BEFORE_PAGE),
        ])
        <div {{$self->getAttributes('page')->merge(['class'=>'page'])}}>
            @if($self->isVertical())
                @include('sentosa::components.panel.partials.side_navigation')
            @endif
            @include('sentosa::components.partials.children', [
                'children' => $self->getChildren(Panel::CHILDREN_POSITION_BEFORE_HEADER),
            ])
            <!-- BEGIN NAVBAR  -->
            <header class="navbar navbar-expand-md d-print-none d-none d-lg-flex">
                <div class="container-xl">
                    @if($self->isVertical())
                        <div>
                            <div class="d-none d-lg-flex">
                                @include('sentosa::components.partials.children', [
                                   'children' => $self->getChildren(Panel::CHILDREN_POSITION_TOP_HEADER),
                                ])
                            </div>
                        </div>
                        <div class="navbar-nav flex-row order-md-last">
                            @include('sentosa::components.partials.children', [
                               'children' => $self->getChildren(Panel::CHILDREN_POSITION_BEFORE_USER),
                            ])
                            @include('sentosa::components.panel.partials.user_navigation')
                        </div>
                    @else
                        <!-- BEGIN NAVBAR TOGGLER -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbar-menu"
                                aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- END NAVBAR TOGGLER -->
                        <!-- BEGIN NAVBAR LOGO -->
                        <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                            <a href="{{$self->getHomeUrl()}}" aria-label="{{$self->getBrandName()}}">
                                @include('sentosa::components.panel.partials.brand_logo')
                            </a>
                        </div>
                        <!-- END NAVBAR LOGO -->
                        <div class="navbar-nav flex-row order-md-last">
                            @include('sentosa::components.partials.children', [
                                'children' => $self->getChildren(Panel::CHILDREN_POSITION_BEFORE_USER),
                            ])
                            @include('sentosa::components.panel.partials.user_navigation')
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-menu">
                            @include('sentosa::components.panel.partials.top_navigation')
                        </div>
                    @endif
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
    @include('sentosa::components.panel.partials.meta')
</x-sentosa::layouts.html>

