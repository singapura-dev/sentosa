<x-sentosa::layouts.html :html-attributes="$self->getAttributes('html')" :body-attributes="$self->getAttributes('body')->merge(['class'=>'layout-fluid'])">
    <x-sentosa::providers.toast>
    @include('sentosa::components.partials.children', [
        'children' => $self->getChildren()
    ])
    </x-sentosa::providers.toast>
    @include('sentosa::components.panel.partials.meta')
</x-sentosa::layouts.html>
