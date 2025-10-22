@php use Sentosa\Components\Panel\Panel; @endphp
<x-sentosa::layouts.html :html-attributes="$self->getAttributes('html')"
                         :body-attributes="$self->getAttributes('body')">
    <x-sentosa::providers.toast>
        @include('sentosa::components.partials.children', [
            'children' => $self->getChildren(Panel::CHILDREN_POSITION_BEFORE_PAGE),
        ])
        <x-dynamic-component :component="'sentosa::panel.layout.'.$self->getLayout()" >
            <div class="page-wrapper">
                <!-- BEGIN PAGE HEADER -->
                @if($header_children = $self->getChildren(Panel::CHILDREN_POSITION_HEADER))
                    <div class="page-header d-print-none" aria-label="Page header">
                        <div class="container-xl">
                            @include('sentosa::components.partials.children',[
                                'children' => $header_children,
                            ])
                        </div>
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
        </x-dynamic-component>
    </x-sentosa::providers.toast>
    @include('sentosa::components.panel.partials.meta')
</x-sentosa::layouts.html>

