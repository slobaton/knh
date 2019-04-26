@php
    $currentPath = explode('.',\Request::route()->getName())[0];
@endphp
<li>
  <a
    class="nav-link @if('home' == $currentPath || '' == $currentPath) active @endif"
    href="{{ route('home') }}"
  >
    <i class="fas fa-home"></i>
    {{ __('messages.common.home') }}
  </a>
</li>

@can('partner-list')
<li>
  <a
    class="nav-link @if('partners' == $currentPath) active @endif"
    href="{{ route('partners.index') }}"
  >
    <i class="fas fa-handshake"></i>
    {{ __('messages.partners.plural') }}
  </a>
</li>
@endcan

@can('project-list')
<li>
  <a
    class="nav-link @if('projects' == $currentPath) active @endif"
    href="{{ route('projects.index') }}"
  >
    <i class="fas fa-project-diagram"></i>
    {{ __('messages.projects.projects') }}
  </a>
</li>
@endcan
@can('user-list')
<li>
    <a
        class="nav-link @if('users' == $currentPath) active @endif"
        href="{{ route('users.index') }}"
    >
      <i class="fas fa-users-cog"></i>
      {{ __('messages.navbar.users') }}
    </a>
</li>
@endcan
@can('role-list')
<li>
    <a
        class="nav-link @if('roles' == $currentPath) active @endif"
        href="{{ route('roles.index') }}"
    >
        <i class="fas fa-address-card"></i>
        {{ __('messages.navbar.roles') }}
    </a>
</li>
@endcan
