@extends('layouts.app')

@component('partials.custombreadcrumbs', [
    'icon' => 'fas fa-project-diagram',
    'title' => 'PROYECTOS',
    'breadcrumb' => 'projects.index'
])
@endcomponent

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="container">
        <div class="row">
          <div class="col-lg-12 margin-tb">
            @can('project-create')
            <div class="float-right">
                <a
                  class="btn btn-primary"
                  href="{{ route('projects.create') }}"
                >
                <i class="fa fa-plus" aria-hidden="true"></i>
                  {{ __('messages.common.create', ['name' => __('messages.projects.project')]) }}
                </a>
            </div>
            @endcan
          </div>
        </div>
      </div>
      <br>
      <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>{{ __('Código') }}</th>
            <th>{{ __('Nombre') }}</th>
            <th>{{ __('Acciones') }}</th>
          </tr>
        </thead>
      </table>

      @php
        $modalTile = __(
          'messages.common_crud.confirm_message',
          ['name' => __('messages.projects.project')]
        );
      @endphp

      @component('components.datatable', [
        'modalTitle' => $modalTile,
        'route' => 'projects.data',
        'order' => [[0, 'desc']],
        'columns' => [
          [
            'data' => 'project_code',
            'name' => 'project_code',
          ], [
            'data' => 'project_name',
            'name' => 'project_name',
          ], [
            'data' => 'action',
            'name' => 'action',
            'orderable' => false,
            'searchable' => false
          ]
        ]
      ])
    @endcomponent
@endsection
