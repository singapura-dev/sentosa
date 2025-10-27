{{$slot}}

@pushonce('after_scripts')
    @if($message = panel()->getToast())
        <script nonce="{{csp_nonce()}}">
            Toastify({
                text: "{{$message}}",
                duration: 3000,
                newWindow: true,
                gravity: 'top', // `top` or `bottom`
                position: 'center', // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: 'unset'
                },
                className: 'bg-{{session('toast.type', 'info')}}',
            }).showToast();
        </script>
    @endif
@endpushonce
