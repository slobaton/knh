@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href={{ asset('css/callout.css') }}>
@endsection

@component('partials.custombreadcrumbs', [
    'icon' => 'fas fa-project-diagram',
    'title' => 'DESCRIPCIÓN DEL PROYECTO',
    'breadcrumb' => 'projects.show'
])
@endcomponent

@section('content')
<div class="container">
    <div class="bd-callout bd-callout-warning">
        <h5 id="conveying-meaning-to-assistive-technologies">Conveying meaning to assistive technologies</h5>

        <p>Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (e.g. the visible text), or is included through alternative means, such as additional text hidden with the <code class="highlighter-rouge">.sr-only</code> class.</p>
        </div>
</div>
@endsection
