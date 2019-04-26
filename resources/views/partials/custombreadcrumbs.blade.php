@section('breadcrumbs')
<div class="clearfix">
    <span
        class="breadcrumb float-left text-uppercase font-weight-bold"
        style="background-color: inherit;"
    >
        <li class="breadcrumb-item">
            <h5>
                <i class="{{ $icon }}"></i> {{ $title }}
            </h5>
        </li>
    </span>
    @if (isset($param))
        {{ Breadcrumbs::render($breadcrumb, $param) }}
    @else
        {{ Breadcrumbs::render($breadcrumb) }}
    @endif
</div>
@endsection
