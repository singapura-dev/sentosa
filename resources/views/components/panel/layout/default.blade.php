@use(Sentosa\Components\Panel\Panel)
<div {{panel()->getAttributes('page')->merge(['class'=>'page'])}}>
    @include('sentosa::components.partials.children', [
        'children' => panel()->getChildren(Panel::CHILDREN_POSITION_BEFORE_HEADER),
    ])
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
                <a href="{{panel()->getHomeUrl()}}">
                    {{panel()->getBrandName()}}
                </a>
            </div>
            <!-- END NAVBAR LOGO -->
            <div class="navbar-nav flex-row order-md-last">
                @include('sentosa::components.partials.children', [
                   'children' => panel()->getChildren(Panel::CHILDREN_POSITION_BEFORE_USER),
                ])
                @include('sentosa::components.panel.partials.user_navigation')
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <!-- BEGIN NAVBAR MENU -->
                @include('sentosa::components.panel.partials.top_navigation')
                <!-- END NAVBAR MENU -->
            </div>
        </div>
    </header>
    {{$slot}}
</div>
