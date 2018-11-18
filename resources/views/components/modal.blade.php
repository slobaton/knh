<div class="modal fade" id="{{ $id }}" aria-hidden="true" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $title }}</h5>
        @isset($closeButton)
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        @endisset
      </div>
      <div class="modal-body">
        {{ $slot }}
      </div>
      @yield('acciones')
    </div>
  </div>
</div>
