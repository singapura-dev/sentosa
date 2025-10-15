<x-sentosa::layouts.html>
    <x-sentosa::providers.toast>
    @include('sentosa::components.partials.children', [
        'children' => $self->getChildren()
    ])
    </x-sentosa::providers.toast>
    @include('sentosa::components.panel.partials.meta')
</x-sentosa::layouts.html>
