<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-{{ $col }}">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <div class="badge badge-info text-wrap">{{ $title }}</div>
            <div>
              {{ $info ?? '' }}
            </div>
          </div>
        </div>

        <div class="card-body">
          {{ $slot }}
        </div>
      </div>
    </div>
  </div>
</div>
