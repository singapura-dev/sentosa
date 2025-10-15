@php use Sentosa\Components\Panel\Panel; @endphp
@pushonce('head_meta')
    <title>{{panel()->getPageTitle() ?: panel()->getBrandName()}}</title>
@endpushonce
@pushonce('before_scripts')
    @include('sentosa::components.partials.children', [
        'children' => panel()->getChildren(Panel::CHILDREN_POSITION_BEFORE_SCRIPT),
    ])
@endpushonce
@pushonce('scripts')
    @include('sentosa::components.partials.children', [
        'children' => panel()->getChildren(Panel::CHILDREN_POSITION_SCRIPT),
    ])
@endpushonce
@pushonce('after_scripts')
    @include('sentosa::components.partials.children', [
        'children' => panel()->getChildren(Panel::CHILDREN_POSITION_AFTER_SCRIPT),
    ])
@endpushonce
@pushonce('before_styles')
    @include('sentosa::components.partials.children', [
            'children' => panel()->getChildren(Panel::CHILDREN_POSITION_BEFORE_STYLE),
    ])
@endpushonce
@pushonce('styles')
    @include('sentosa::components.partials.children', [
        'children' => panel()->getChildren(Panel::CHILDREN_POSITION_STYLE),
    ])
@endpushonce
@pushonce('after_styles')
    @include('sentosa::components.partials.children', [
        'children' => panel()->getChildren(Panel::CHILDREN_POSITION_AFTER_STYLE),
    ])
@endpushonce
