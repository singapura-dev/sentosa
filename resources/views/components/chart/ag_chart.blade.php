<div id="{{$self->getId()}}" {{$self->getAttributes()}}></div>

@push('after_scripts')
    <script>
        (function () {
            const options = {!! to_string($self->getOptions()) !!};
            agCharts.AgCharts.create(options);
        })();
    </script>
@endpush
