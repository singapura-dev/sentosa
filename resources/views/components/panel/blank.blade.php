<x-sentosa::layouts.html>
    @include('sentosa::components.partials.children', [
        'children' => $self->getChildren()
    ])
</x-sentosa::layouts.html>
