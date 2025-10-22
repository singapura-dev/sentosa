@use(\Sentosa\Components\Panel\Panel)
<div {{panel()->getAttributes('page')->merge(['class'=>'page'])}}>
    @include('sentosa::components.panel.partials.side_navigation')
    @include('sentosa::components.partials.children', [
        'children' => panel()->getChildren(Panel::CHILDREN_POSITION_BEFORE_HEADER),
    ])
    <!-- BEGIN NAVBAR  -->
    <header class="navbar navbar-expand-md d-print-none d-none d-lg-flex">
        <div class="container-xl">
            <div>
                <div class="d-none d-lg-flex">
                    @include('sentosa::components.partials.children', [
                       'children' => panel()->getChildren(Panel::CHILDREN_POSITION_TOP_HEADER),
                    ])
                </div>
            </div>
            <div class="navbar-nav flex-row order-md-last">
                @include('sentosa::components.partials.children', [
                   'children' => panel()->getChildren(Panel::CHILDREN_POSITION_BEFORE_USER),
                ])
                @include('sentosa::components.panel.partials.user_navigation')
            </div>
        </div>
    </header>
    <!-- END NAVBAR  -->
    {{$slot}}
</div>
