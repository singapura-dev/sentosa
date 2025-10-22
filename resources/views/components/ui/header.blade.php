<div class="row g-2 align-items-center">
    <div class="col">
        <div class="page-pretitle">{{$self->getSubtitle()}}</div>
        <h2 class="page-title">{{$self->getTitle()}}</h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
        {!! render($self->getRight()) !!}
    </div>
</div>
