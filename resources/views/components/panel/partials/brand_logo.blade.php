@if($logo = panel()->getBrandLogo())
    <img src="{{$logo}}" class="brand-logo" alt="{{panel()->getBrandName()}} Logo">
@else
    {{panel()->getBrandName()}}
@endif
