{{$slot}}

@pushonce('after_scripts')
    @if($message = panel()->getToast())
        <script>
            alert("{{$message}}");
        </script>
    @endif
@endpushonce
