<li>
  <a class="nav-link" href="{{ route('home') }}">
    <i class="fas fa-home"></i>
    {{ __('messages.common.home') }}
  </a>
</li>

@can('partners-list')
<li>
  <a class="nav-link" href="{{ route('partners.index') }}">
    <i class="fas fa-handshake"></i>
    {{ __('messages.partners.plural') }}
  </a>
</li>
@endcan

@can('projects-list')
<li>
  <a class="nav-link" href="{{ route('home') }}">
    <i class="fas fa-project-diagram"></i>
    {{ __('messages.projects.plural') }}
  </a>
</li>
@endcan
